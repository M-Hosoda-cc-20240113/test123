<?php

use App\Http\Controllers\Admin\Agent\AgentController;
use App\Http\Controllers\Admin\Station\StationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Index\IndexController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Skill\SkillController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\Position\PositionController;
use App\Http\Controllers\Admin\Application\ApplicationController;
use App\Http\Controllers\Admin\Assignment\AssignmentController;
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
  Route::get('/', [IndexController::class, 'index'])->name('admin.index');
});
/**
 * Admin Users
 * @var array
 */
Route::namespace('User')->prefix('users')->group(function () {
  Route::get('/', [UserController::class, 'list'])->name('user.list');
  Route::get('/{user_id}', [UserController::class, 'detail'])->name('user.detail');
  Route::get('/{user_id}/edit', [UserController::class, 'edit'])->name('user.edit');
  Route::get('/{user_id}/delete', [UserController::class, 'delete'])->name('user.delete');
});
/**
 * Admin Projects
 * @var array
 */
Route::namespace('Project')->prefix('projects')->group(function () {
  Route::get('/', [ProjectController::class, 'list'])->name('project.list');
  Route::get('/create', [ProjectController::class, 'showCreateForm'])->name('project.create.form');
  Route::post('/create', [ProjectController::class, 'create'])->name('project.create');
  Route::get('/{project_id}', [ProjectController::class, 'detail'])->name('project.detail');
  Route::get('/{project_id}/edit', [ProjectController::class, 'showEditForm'])->name('project.edit.form');
  Route::post('/{project_id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
  Route::get('/{project_id}/delete', [ProjectController::class, 'delete'])->name('project.delete');
  Route::get('/{project_id}/toggle', [ProjectController::class, 'toggle'])->name('project.toggle');
  Route::get('/{project_id}/delete', [ProjectController::class, 'delete'])->name('project.delete');
});

Route::namespace('Agent')->prefix('agent')->group(function () {
    Route::get('/',[AgentController::class, 'list'])->name('agent.list');
    Route::get('/create',[AgentController::class, 'showCreateForm'])->name('agent.create.form');
    Route::post('/create',[AgentController::class, 'create'])->name('agent.create');
});

Route::namespace('Station')->prefix('station')->group(function () {
    Route::get('/',[StationController::class, 'list'])->name('station.list');
    Route::get('/create',[StationController::class, 'showCreateForm'])->name('station.create.form');
    Route::post('/create',[StationController::class, 'create'])->name('station.create');
});

Route::namespace('Skill')->prefix('skills')->group(function () {
  Route::get('/', [SkillController::class, 'list'])->name('skill.list');
  Route::get('/edit', [SkillController::class, 'edit'])->name('skill.edit');
});

Route::namespace('Position')->prefix('positions')->group(function () {
  Route::get('/', [PositionController::class, 'list'])->name('position.list');
  Route::get('/edit', [PositionController::class, 'edit'])->name('position.edit');
});

 Route::namespace('Application')->prefix('applications')->group(function () {
  Route::get('/', [ApplicationController::class, 'list'])->name('application.list');
});

 Route::namespace('Assignment')->prefix('assignments')->group(function () {
  Route::get('/', [AssignmentController::class, 'list'])->name('assignment.list');
});
