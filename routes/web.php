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
Route::get('/store', function () {
    return view('store');
});

Route::get('/createaccount', function () {
    return view('account');
});
Route::get('/editaccount', function () {
    return view('account2');
});
Route::get('/createclasses', function () {
    return view('classes1');
});
Route::get('/editclasses', function () {
    return view('classes2');
});
Route::get('/createitem', function () {
    return view('item');
});
Route::get('/edititem', function () {
    return view('item1');
});
Route::get('/adminaccount', function () {
    return view('dasboardadmin1');
});
Route::get('/adminclasses', function () {
    return view('dasboardadmin2');
});
Route::get('/adminitem', function () {
    return view('dasboardadmin3');
});
Route::get('/dasboarduser', function () {
    return view('dasboardmember');
});


