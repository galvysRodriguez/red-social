<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\upPublicationController;
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


// Ruta para el inicio
Route::get('/', [PublicacionController::class, 'index']);

// Ruta para la vista de inicio de sesión
Route::get('/login', [LoginController::class, 'showLogin'])->middleware('guest')->name('login');

// Ruta para el proceso de inicio de sesión
Route::post('/login', [LoginController::class, 'login']);

// Ruta para la vista de registro
Route::get('/register', [RegisterController::class, 'showRegister'])->middleware('guest');

// Ruta para el proceso de registro
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/cerrar', [LoginController::class, 'cerrar']);

// Ruta para la vista de restablecimiento de contraseña
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->middleware('guest');

Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);

Route::get('/update-password/{token}', [UpdatePasswordController::class, 'showUpdatePassword'])->name('password.reset')->middleware('guest');

Route::post('/update-password', [UpdatePasswordController::class, 'updatePassword'])->name('password.update');

Route::get('/profile', [ProfileController::class, 'showProfile'])->middleware('auth');

Route::get('/profile/{idEncriptado}', [ProfileController::class, 'showProfileOther'])->name('profile-user');

Route::post('/like', [LikeController::class, 'likes'])->name('likes');

Route::post('/save', [SaveController::class, 'saves'])->name('saves');

Route::post('/follow', [LikeController::class, 'following']);

Route::get('/save', [SaveController::class, 'showSaves'])->middleware('auth');

Route::post('/upPublication', [upPublicationController::class, 'upPublication'])->middleware('auth');

Route::get('/upPublication', [upPublicationController::class, 'showUpPublication'])->middleware('auth');

/*
Route::post('/update-password', [ForgotPasswordController::class, 'updatePassword']);

// Ruta para enviar el correo electrónico de restablecimiento de contraseña
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');*/