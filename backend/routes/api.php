<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;


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

//videos
Route::get('/videos', [VideosController::class,'readAllvideos']);
Route::post('/videos', [VideosController::class,'createvideo']);
Route::get('/videos/{id}', [VideosController::class, 'readvideo']);
Route::put('/videos/{id}', [VideosController::class, 'updatevideo']);
Route::delete('/videos/{id}', [VideosController::class, 'deletevideo']);

//books

Route::get('/books', [BooksController::class,'readAllbooks']);
Route::post('/books', [BooksController::class,'createbooks']);
Route::get('/books/{id}', [BooksController::class, 'readbooks']);
Route::put('/books/{id}', [BooksController::class, 'updatebooks']);
Route::delete('/books/{id}', [BooksController::class, 'deletebooks']);

//subjects
Route::get('/subject', [SubjectController::class,'readAllSubjects']);
Route::post('/subject', [SubjectController::class,'createSubject']);
Route::get('/subject/{id}', [SubjectController::class, 'readSubject']);
Route::put('/subject/{id}', [SubjectController::class, 'updateSubject']);
Route::delete('/subject/{id}', [SubjectController::class, 'deleteSubject']);

//grades
Route::get('/grade', [GradeController::class,'readAllGrades']);
Route::post('/grade', [GradeController::class,'createGrade']);
Route::get('/grade/{id}', [GradeController::class, 'readGrade']);
Route::put('/grade/{id}', [GradeController::class, 'updateGrade']);
Route::delete('/grade/{id}', [GradeController::class, 'deleteGrade']);


                                                     //Authentication

//inside guard so yes auth
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/users', [UserController::class,'readAllUsers']);
    Route::get('/users/{id}', [UsersController::class, 'readUser']);
Route::put('/users/{id}', [UsersController::class, 'updateUser']);
Route::delete('/users/{id}', [UsersController::class, 'deleteUser']);
    Route::post('/logout',[AuthController::class,'logout']);
});

//outside guard
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);  



