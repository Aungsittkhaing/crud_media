<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//category
Route::resource('category', CategoryController::class);
//item
Route::resource('item', ItemController::class);
