<?php

use App\Http\Controllers\SectionController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('sections', SectionController::class);
Route::group(['prefix'=> 'sections/{section_id}'], function(){
    Route::resource('tasks', TaskController::class);
    Route::put('tasks/{id}/to-done', [TaskController::class, 'changeStateToDone']);
    Route::put('tasks/{id}/to-todo', [TaskController::class, 'changeStateToTodo']);
});
