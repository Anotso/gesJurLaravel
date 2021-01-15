<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
        CONTROLLERs DAS PÁGINAS EXTERNAS
*/
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/plans', [IndexController::class, 'plans'])->name('plans');
Route::get('/services', [IndexController::class, 'services'])->name('services');
Route::get('/register', [UserController::class, 'newUser'])->name('register');
Route::get('/login', [AuthController::class, 'index'])->name('login');
/*
        CONTROLLERs DAS PÁGINAS INTERNAS
*/