<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShapeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shapes', [ShapeController::class, 'index']);
Route::get('/shapes/calculate', [ShapeController::class, 'calculate']);
