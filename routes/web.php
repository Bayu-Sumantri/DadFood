<?php

use App\Models\Food;
use App\Models\User;
use App\Models\Booking;
use App\Models\MenuPromo;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuPromoController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\Cetak_resi_transaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $food = Food::all();
    $promo = MenuPromo::all();

    return view('landing_pages.index', compact('food', 'promo'));
});


Route::get('/Menu', function () {
    $food = Food::all();
    return view('landing_pages.header_menu.menu', compact('food'));
})->name('Menu');
Route::get('/Book', function () {
    return view('landing_pages.header_menu.book');
})->name('Book');
Route::get('/About', function () {
    return view('landing_pages.header_menu.about');
})->name('About');


Route::get('/dashboard', function () {
    $total_food = Food::count();
    $total_promo = MenuPromo::count();
    $total_pemesanan = Pemesanan::count();
    $total_users = User::count();
    $total_booking = Booking::count();

    // Check if the authenticated user is an admin
    $isAdmin = Auth::check() && Auth::user()->roles->contains('name', 'admin');

    return view('admin_master.index', compact('total_food', 'total_promo', 'total_pemesanan', 'total_users', 'total_booking', 'isAdmin'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//user create and destroy and update
Route::resource('Users', 'App\Http\Controllers\UserController');
Route::patch('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/delete/{id}', [UserController::class, "destroy"])->name('delate.destroy');
Route::get('/edit_user/{id}', function (string $id) {
    $user = User::findOrFail($id);
    // return $user;
    return view('admin_master.admin_sup.edit.user_edit', compact('user'));
})->name('user.edit');

Route::get('/create_user', function () {
    return view('admin_master/admin_sup/create_user');
})->name('create_user');

// user myprofile
Route::get('/profil', function () {
    return view('admin_master/user_sup/user_edit');
})->name('profil');

Route::resource('Poto', 'App\Http\Controllers\PotoController')->parameters(['Poto'  => 'user']);
Route::get('/profil_edit', function () {
    return view('admin_master/user_sup/user_edit');
})->name('admin.user.Myprofile');


//create menu
Route::get('/create_menu', function () {
    return view('admin_master/admin_sup/create_menu');
})->name('create_menu');

Route::resource('Food', 'App\Http\Controllers\FoodController');
Route::get('/FoodCreate', [FoodController::class, "create"])->name('foodcreate'); // halaman create menu saja
Route::get('/menu_show', function () {
    $food = Food::orderBy('nama_makanan', 'asc')->simplePaginate(10);

    return view('admin_master/admin_sup/menu_show', compact('food'));
})->name('menu_show');

//promo menu
Route::resource('Promo', 'App\Http\Controllers\MenuPromoController');
Route::get('/promomenu', function () {
    return view('admin_master/admin_sup/menu_promo/index');
})->name('promomenu');
Route::get('/promocreate', [MenuPromoController::class, "create"])->name('promocreate'); // halaman create menu saja
Route::get('/menu_promo', function () {
    $promo = MenuPromo::orderBy('nama_makanan', 'asc')->simplePaginate(10);

    return view('admin_master/admin_sup/menu_promo/show_promo', compact('promo'));
})->name('menu_promo');

Route::get('/edit_promoZ/{id}', function (string $id) {
    $promo = MenuPromo::findOrFail($id);
    $allpromo = MenuPromo::all();
    // return $episode;
    return view('admin_master.admin_sup.menu_promo.edit_promo', compact('promo', 'allpromo'));
})->name('edit_promo');



//edit menu
Route::get('/edit_menu/{id}', function (string $id) {
    $food = Food::findOrFail($id);
    $allfood = Food::all();
    // return $episode;
    return view('admin_master.admin_sup.edit/edit_menu', compact('food', 'allfood'));
})->name('edit_menu');
Route::patch('/edit_menuFood/{id}', [FoodController::class, 'update'])->name('edit_menuFood');





//pemesanan
Route::resource('Pemesanan', 'App\Http\Controllers\PemesananController')->middleware(['auth']);
Route::get('/pemesanan_food/{id}', function (string $id) {
    $food = Food::findOrFail($id);
    $allfood = Food::all();
    // return $episode;
    return view('landing_pages.pemesanan_menu.pesan_menu', compact('food', 'allfood'));
})->name('pemesanan_food')->middleware(['auth']);

Route::post('/buat_pemesanan', [PemesananController::class, 'store'])->name('buat_pemesanan');


// booking / reservasi table restoran
Route::resource('booking', 'App\Http\Controllers\BookingController');

Route::get('/booking_table', [BookingController::class, "create"])->name('booking_table'); // halaman create menu saja


// pemesanan AdminShow
Route::get('/pemesanan_show', function () {
    $pemesanan = Pemesanan::simplePaginate(10);
    // return $episode;
    return view('admin_master.admin_sup.pemesanan_show', compact('pemesanan'));
})->name('pemesanan_show');


// pemesanan User
Route::get('/pemesanan_user', function () {
    // $pemesanan = Pemesanan::paginate(10);

    // Mengambil data pemesanan
    $pemesanan = Pemesanan::whereHas('user', function ($query) {
        // Menerapkan kondisi where pada relasi 'user'
        return $query->where('id', auth()->id());
    })->with('pembayaran')->paginate('10');

    return view('admin_master.user_sup.pemesanan_show', compact('pemesanan'));
})->name('pemesanan_user')->middleware(['auth']);
Route::patch('/pemesanan_payment/{id}', [PemesananController::class, 'update'])->name('pemesanan_payment.update');


// Route::delete('/delete/{id}', [PemesananController::class,"destroy"])->name('delate.pemesanan');

// pembelia user
Route::resource('pembelian', 'App\Http\Controllers\PembelianController');
Route::get('/pembelian_show', [PembelianController::class, 'index'])->name('pembelian_show');



//show total pemesanan {admin}
Route::get('/pemesanan_admin_show', function () {
    $pemesanan = Pemesanan::simplePaginate(10);
    // return $episode;
    return view('admin_master.admin_sup.pembelian_admin_show', compact('pemesanan'));
})->name('pemesanan_admin_show')->middleware(['auth']);




//show total pemesanan show and edit {admin}
Route::get('/all_transaksi', function () {
    $pembelian = Pembayaran::simplePaginate(10);

    return view('admin_master.admin_sup.all_transaksi', compact('pembelian'));
})->name('all_transaksi')->middleware(['auth']);

Route::patch('/all_transaksi/{id}', [PembelianController::class, 'update'])->name('all_transaksi.update');



//show transaksi user CRUD
Route::get('/transaksi_user_show', function () {
    $pembelian = Pembayaran::whereHas('pemesanan', function ($query) {
        $query->whereHas('user', function ($query1) {
            return $query1->where('id', auth()->id());
        });
    })->paginate(10); // Tambahkan paginate(10) untuk membatasi jumlah item per halaman

    return view('admin_master.user_sup.cetak_resi.cetak_resi', compact('pembelian'));
})->name('transaksi_user_show')->middleware(['auth']);

Route::get('cetakPDF/{id}', [Cetak_resi_transaksiController::class, "cetakPDF"])->name('cetakPDF');



// Route::get('/resi_pembelian/{id}', function (string $id) {
//     $pembelian = Pembayaran::findOrFail($id);
//     // $transaksi = Transaksi::all();
//     // return $episode;
//     return view('admin_master.user_sup.cetak_resi.cetak_resi_full', compact('pembelian'));
// })->name('resi_pembelian');


//booking user admin

Route::resource('booking', 'App\Http\Controllers\BookingController');

Route::get('/booking', function () {
    $booking = Booking::simplePaginate(10);

    return view('admin_master.user_sup.booking_show', compact('booking'));
})->name('booking')->middleware(['auth']);

Route::get('/booking_admin', function () {
    $booking = Booking::simplePaginate(10);

    return view('admin_master.admin_sup.all_booking', compact('booking'));
})->name('booking_admin')->middleware(['auth']);

//cetak resi booking
Route::get('cetakPDF_booking/{id}', [Cetak_resi_transaksiController::class, "cetakPDF_booking"])->name('cetakPDF_booking');













require __DIR__ . '/auth.php';
