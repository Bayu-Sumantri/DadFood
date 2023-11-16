<?php

use App\Models\Food;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MenuPromoController;
use App\Http\Controllers\PotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemesananController;
use App\Models\MenuPromo;
use App\Models\Pemesanan;

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

    return view('landing_pages.index', compact('food','promo'));
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
    $total_users = User::count();
    $total_pemesanan = Pemesanan::count();
    return view('admin_master.index', compact('total_users','total_food','total_promo', 'total_pemesanan'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//user create and destroy
Route::resource('Users','App\Http\Controllers\UserController');
Route::delete('/delete/{id}', [UserController::class,"destroy"])->name('delate.destroy');
Route::get('/edit_user/{id}', function (string $id) {
    $user=User::findOrFail($id);
    // return $user;
    return view('admin_master.side_admin.user_edit', compact('user'));
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
Route::get('/FoodCreate', [FoodController::class,"create"])->name('foodcreate'); // halaman create menu saja
Route::get('/menu_show', function () {
    $food = Food::orderBy('nama_makanan', 'asc')->simplePaginate(10);
    
    return view('admin_master/admin_sup/menu_show', compact('food'));
})->name('menu_show');

//promo menu
Route::resource('Promo', 'App\Http\Controllers\MenuPromoController');
Route::get('/promomenu', function () {
    return view('admin_master/admin_sup/menu_promo/index');
})->name('promomenu');
Route::get('/promocreate', [MenuPromoController::class,"create"])->name('promocreate'); // halaman create menu saja
Route::get('/menu_promo', function () {
    $promo = MenuPromo::orderBy('nama_makanan', 'asc')->simplePaginate(10);
    
    return view('admin_master/admin_sup/menu_promo/show_promo', compact('promo'));
})->name('menu_promo');

Route::get('/edit_promoZ/{id}', function (string $id) {
    $promo = MenuPromo::findOrFail($id);
    $allpromo = MenuPromo::all();
    // return $episode;
    return view('admin_master.admin_sup.menu_promo.edit_promo', compact('promo','allpromo'));
})->name('edit_promo');



//edit menu
Route::get('/edit_menu/{id}', function (string $id) {
    $food = Food::findOrFail($id);
    $allfood = Food::all();
    // return $episode;
    return view('admin_master.admin_sup.edit/edit_menu', compact('food','allfood'));
})->name('edit_menu');
Route::patch('/edit_menuFood/{id}', [FoodController::class, 'update'])->name('edit_menuFood');





//pemesanan
Route::resource('Pemesanan', 'App\Http\Controllers\PemesananController');
Route::get('/pemesanan_food/{id}', function (string $id) {
    $food = Food::findOrFail($id);
    $allfood = Food::all();
    // return $episode;
    return view('landing_pages.pemesanan_menu.pesan_menu', compact('food','allfood'));
})->name('pemesanan_food');

Route::post('/buat_pemesanan', [PemesananController::class, 'store'])->name('buat_pemesanan');








require __DIR__.'/auth.php';