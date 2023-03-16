<?php

use App\Http\Controllers\Api\AuthorsController;
use App\Http\Controllers\Api\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/authors', AuthorsController::class);
Route::apiResource('/books', BooksController::class);