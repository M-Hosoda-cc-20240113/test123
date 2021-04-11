<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Index\IndexController;
use App\Http\Controllers\Front\Home\HomeController;
use App\Http\Controllers\TestController;
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
    Route::get('/project/{id}', [IndexController::class, 'show'])->name('front.index.project');
  });
Route::namespace('Home')->prefix('mypage')->middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.mypage');
    Route::get('/users/edit', [HomeController::class, 'edit'])->name('home.mypage.edit');
    Route::get('/skills/edit', [HomeController::class, 'skill'])->name('home.mypage.skill.edit');
  });
// Route::get('/test', [TestController::class, 'index'])->name('test.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
