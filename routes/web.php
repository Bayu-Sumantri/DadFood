<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;


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
    return view('landing_pages.index');
});


Route::get('/Menu', function () {
    return view('landing_pages.header_menu.menu');
})->name('Menu');
Route::get('/Book', function () {
    return view('landing_pages.header_menu.book');
})->name('Book');
Route::get('/About', function () {
    return view('landing_pages.header_menu.about');
})->name('About');


Route::get('/dashboard', function () {
    $total_users = User::count();
    return view('admin_master.index', compact('total_users'));
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

Route::resource('Poto', 'App\Http\Controllers\PotoController')->parameters(['Poto'  => 'user']);;
Route::get('/profil_edit', function () {
    return view('admin_master/user_sup/user_edit');
})->name('admin.user.Myprofile');




require __DIR__.'/auth.php';