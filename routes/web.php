<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route Dashboard
Route::get('/', function () {
    return view('dashboard');
});

//Route Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//route role middleware
Route::middleware(['auth'])->group(
    function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

        Route::get('/classes', [ClassesController::class, 'index'])->name('classes');

        Route::get('/product', [ProductController::class, 'index'])->name('product');

        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

        Route::get('/member', [MemberController::class, 'index'])->name('member');
    }
);



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
