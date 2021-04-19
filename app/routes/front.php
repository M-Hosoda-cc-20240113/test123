<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Index\IndexController;
use App\Http\Controllers\Front\Home\HomeController;
use App\Http\Controllers\Front\Auth\RegisterController;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Project\ProjectController;
use App\Http\Controllers\Front\Auth\ResetPasswordController;
use App\Http\Controllers\Front\Auth\ForgotPasswordController;

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
Route::namespace('Index')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('front.index');
});
Route::namespace('Home')->prefix('mypage')->middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.mypage');
    Route::get('/users/edit', [HomeController::class, 'edit'])->name('home.mypage.edit');
    Route::get('/skills/edit', [HomeController::class, 'skill'])->name('home.mypage.skill.edit');
});

Route::namespace("Auth")->group(function() {
  Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
  Route::post('register', [RegisterController::class, 'register'])->name('auth.register');
  Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
  Route::post('login', [LoginController::class, 'login']);
  Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::namespace('Auth')->prefix('password')->group(function () {
    Route::get('reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('reset', [ResetPasswordController::class,'reset']);
    Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset/{token}/{email_hash}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
});

Route::namespace("Detail")->prefix('project')->group(function () {
    Route::get('/{id}', [ProjectController::class, 'detail'])->name('front.project.detail');
    Route::post('/{id}/application', [ProjectController::class, 'create_application'])->name('front.project.app');
});
