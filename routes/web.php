<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return \App\Models\TheLoai::all();
//});

Route::get('/',function (){
    return csrf_token();
});

//User CURD
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'getAUser']);
Route::post('/users',[UserController::class,'addUser']);
Route::put('/users/{id}',[UserController::class,'updateUser']);
Route::delete('/users/{id}',[UserController::class,'deleteUser']);

//Book
Route::get('/books',[BookController::class,'index']);
Route::get('/books/{id}',[BookController::class,'getAbook']);
Route::get('/books/{idBook}/{filename}',[BookController::class,'getImageBook']);
Route::post('/books',[BookController::class,'addBook']);
Route::put('/books/{id}',[BookController::class,'updateBook']);
Route::delete('/books/{id}',[BookController::class,'deleteBook']);

//Comment
Route::post('/comments',[CommentController::class,'addComment']);
Route::get('/comments/books/{idBook}',[CommentController::class,'getBookComment']);
Route::put('/comments/{id}',[CommentController::class,'updateComment']);
Route::delete('/comments/{id}',[CommentController::class,'deleteComment']);



//Like
Route::post('/likes',[LikeController::class,'addLike']);
Route::delete('/unlike/{idUser}&{idBook}',[LikeController::class,'unLike']);
Route::get('/likes/books/{idBook}',[LikeController::class,'getBookLike']);

//Favorite
Route::post('/favorites',[FavoriteController::class,'addFavoriteBook']);
Route::delete('/unFavorite/{idUser}&{idBook}',[FavoriteController::class,'removeFavoriteBook']);
Route::get('/favorites/users/{idUser}',[FavoriteController::class,'getFavoriteBookFromUser']);

