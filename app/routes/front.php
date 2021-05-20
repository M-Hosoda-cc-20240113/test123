<?php

use App\Http\Controllers\Front\Application\ApplicationController;
use App\Http\Controllers\Front\Email\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Index\IndexController;
use App\Http\Controllers\Front\Home\HomeController;
use App\Http\Controllers\Front\Auth\RegisterController;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Project\ProjectController;
use App\Http\Controllers\Front\Auth\ResetPasswordController;
use App\Http\Controllers\Front\Auth\ForgotPasswordController;
use App\Http\Controllers\Front\User\UserController;

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
});

Route::namespace('User')->prefix('users')->group(function () {
    Route::get('/edit', [UserController::class, 'showEditForm'])->name('front.user.edit');
    Route::post('/edit', [UserController::class, 'edit']);
    Route::get('/skills/edit', [UserController::class, 'showEditSkillForm'])->name('front.user.skill.form');
    Route::post('/skills/edit', [UserController::class, 'skillEdit'])->name('front.user.skill.edit');
    Route::get('/leave', [UserController::class, 'showDeleteForm'])->name('front.user.delete.form');
    Route::post('/delete', [UserController::class, 'delete'])->name('front.user.delete');
});

Route::namespace('Email')->prefix('email')->group(function () {
    Route::get('reset', [EmailController::class, 'showEditForm'])->name('email.request');
    Route::post('sendEmail', [EmailController::class, 'sendChangeEmail'])->name('email.sendEmail');
    Route::get('reset/{token}/{email_hash}', [EmailController::class, 'changeEmail'])->name('email.reset');
});

Route::namespace("Auth")->group(function () {
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('auth.register');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::namespace('Auth')->prefix('password')->group(function () {
    Route::get('reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('reset', [ResetPasswordController::class, 'reset']);
    Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset/{token}/{email_hash}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
});

Route::namespace('Project')->prefix('project')->group(function () {
    Route::get('/search', [ProjectController::class, 'search'])->name('front.project.search');
    Route::get('/{project_id}', [ProjectController::class, 'detail'])->name('front.project.detail');
});

Route::namespace('Application')->prefix('application')->group(function () {
    Route::post('/project', [ApplicationController::class, 'createApplication'])->name('front.project.app');
});
