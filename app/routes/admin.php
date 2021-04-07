<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Index\IndexController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Skill\SkillController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\Position\PositionController;
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
/**
 * Admin top
 * @var array
 */
Route::namespace('Index')->group(function () {
  Route::get('/', [IndexController::class, 'index'])->name('index');
});
/**
 * Admin Users
 * @var array
 */
Route::namespace('User')->prefix('users')->group(function () {
  Route::get('/', [UserController::class, 'list'])->name('user.list');
  Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
  Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
  Route::get('/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
});
/**
 * Admin Projects
 * @var array
 */
Route::namespace('Project')->prefix('projects')->group(function () {
  Route::get('/', [ProjectController::class, 'list'])->name('project.list');
  Route::get('/{id}', [ProjectController::class, 'show'])->name('project.show');
  Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
  Route::get('/{id}/delete', [ProjectController::class, 'delete'])->name('project.delete');
});
/**
 * Admin Skills
 * @var array
 */
Route::namespace('Skill')->prefix('skills')->group(function () {
  Route::get('/', [SkillController::class, 'list'])->name('skill.list');
  Route::get('/edit', [SkillController::class, 'edit'])->name('skill.edit');
});
/**
 * Admin Positions
 * @var array
 */
Route::namespace('Position')->prefix('positions')->group(function () {
  Route::get('/', [PositionController::class, 'list'])->name('position.list');
  Route::get('/edit', [PositionController::class, 'edit'])->name('position.edit');
});
