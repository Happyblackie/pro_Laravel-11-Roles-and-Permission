<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'auth_login']);


Route::group(['middleware' => 'useradmin'], function(){
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

        //roles
    Route::get('panel/role', [RoleController::class, 'list']);
    Route::get('panel/role/add', [RoleController::class, 'add']);//create form
    Route::post('panel/role/add', [RoleController::class, 'insert']);//to db
    Route::get('panel/role/edit/{id}', [RoleController::class, 'edit']);//to edit file
    Route::post('panel/role/edit/{id}', [RoleController::class, 'update']);//to db
    Route::get('panel/role/delete/{id}', [RoleController::class, 'delete']);



    Route::get('panel/user', [UserController::class, 'list']);
    Route::get('panel/user/add', [UserController::class, 'add']);//create form
    Route::post('panel/user/add', [UserController::class, 'insert']);//to db
    Route::get('panel/user/edit/{id}', [UserController::class, 'edit']);//to edit file
    Route::post('panel/user/edit/{id}', [UserController::class, 'update']);//to db
    Route::get('panel/user/delete/{id}', [UserController::class, 'delete']);
   

});

Route::get('logout', [AuthController::class, 'logout']);

