<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class,'readAllUsers']);
Route::post('/users', [UserController::class,'createUser']);
Route::get('/users/{id}', [UserController::class, 'readUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);

Route::get('/videos', [VideosController::class,'readAllvideos']);
Route::post('/videos', [VideosController::class,'createvideo']);
Route::get('/videos/{id}', [VideosController::class, 'readvideo']);
Route::put('/videos/{id}', [VideosController::class, 'updatevideo']);
Route::delete('/videos/{id}', [VideosController::class, 'deletevideo']);


                                                     //Authentication

//inside guard
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/users', [UserController::class,'readAllUsers']);
    Route::post('/logout',[AuthController::class,'logout']);
});

//outside guard
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);  



