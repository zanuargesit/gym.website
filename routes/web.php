<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/dasboard', function () {
    return view('dasboard');
});
Route::get('/classes', function () {
    return view('classes');
});


