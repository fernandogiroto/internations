<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserIsAdmin;

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

Route::prefix('internations')->middleware(['jwt.auth','checkisadmin'])->group(function() {

    // Users API
    Route::get('users', 'App\Http\Controllers\UserController@index');
    Route::post('users/create', [App\Http\Controllers\UserController::class, 'store']);
    Route::delete('users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
    Route::get('usersauth', 'App\Http\Controllers\UserController@usersauth');
    Route::get('user/role', 'App\Http\Controllers\UserController@user_role');

     // Groups API
     Route::get('groups', 'App\Http\Controllers\GroupController@index');
     Route::post('groups/create', [App\Http\Controllers\GroupController::class, 'store']);
     Route::get('/groups/users/{group_id}', [App\Http\Controllers\GroupController::class, 'get_users_group']);
     Route::put('/groups/add_user', [App\Http\Controllers\GroupController::class, 'add_user_to_group']);
     Route::put('/groups/edit_users', [App\Http\Controllers\GroupController::class, 'edit_users_group']);
     Route::delete('/groups/delete/{id}', [App\Http\Controllers\GroupController::class, 'destroy']);
     
});

    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');



