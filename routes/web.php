<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;

Route::get('/', function () {
    return view('home');
});

Route::resource('/houses', HouseController::class)->only(['index']);
