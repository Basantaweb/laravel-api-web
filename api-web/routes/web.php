<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    return view('home');
    //return 'Collections';
});

Route::get('/api-documentation', function () {
    return view('apiDoc');
});


Route::get('/item-list', [ApiController::class, 'index']);
Route::get('/items/{id}', [ApiController::class, 'show']);