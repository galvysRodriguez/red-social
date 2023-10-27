<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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

/*Route::get('/', function () {
    return view('index');
});*/

// Ruta para el inicio
Route::get('/', [PublicacionController::class, 'index']);

// Ruta para la vista de inicio de sesión
Route::get('/login', [LoginController::class, 'showLogin'])->middleware('guest');

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

Route::post('/update-password', [ForgotPasswordController::class, 'updatePassword']);

// Ruta para enviar el correo electrónico de restablecimiento de contraseña
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');