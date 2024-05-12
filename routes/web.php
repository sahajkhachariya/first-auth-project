<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customauthcontroller;
use App\Http\Controllers\AdminsideController;

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
    return view('welcome');
});
Route::get('/login',[CustomAuthController::class,'login'])->name('login');
Route::get('/register',[CustomAuthController::class,'register']);
Route::post('/register-user',[CustomAuthController::class,'registeruser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class,'loginuser'])->name('login-user');
Route::get('/home',[CustomAuthController::class,'home'])->name('home');
Route::get('/logout', [CustomAuthController::class,'logout'])->name('logout');

//change pass
Route::get('/change-password-form', [CustomAuthController::class, 'showChangePasswordForm']);
Route::post('/changepass', [CustomAuthController::class, 'changePassword']);
// admin
Route::get('/data', [AdminsideController::class,'data'])->name('data');
Route::get('delete/{id}', [AdminsideController::class,'delete'])->name('delete');
Route::get('change/{id}', [AdminsideController::class,'change'])->name('change');
Route::post('change_data/{id}', [AdminsideController::class,'change_data'])->name('update_data');