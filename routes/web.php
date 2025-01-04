<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route Dashboard
Route::get('/', function () {
    return view('dashboard');
});

// Route Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Role Middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/classes', [ClassesController::class, 'index'])->name('classes');
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/member', [MemberController::class, 'index'])->name('member');
});
Route::get('/store', [ProductController::class, 'index'])->name('store.index');
// Admin Routes for Product Management
Route::get('/admin/store/create', [ProductController::class, 'create'])->name('store.create');
Route::get('/admin/store/edit/{id}', [ProductController::class, 'edit'])->name('store.edit');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Admin Dashboard
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('store', ProductController::class);
});

Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.username.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.username.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.username.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.username.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.username.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.username.destroy');
    }); 
Route::prefix('admin')->group(function () {
    Route::get('/classes', [UserController::class, 'index'])->name('admin.classes.index');
    Route::get('/classes/create', [UserController::class, 'create'])->name('admin.classes.create');
    Route::post('/classes', [UserController::class, 'store'])->name('admin.classes.store');
    Route::get('/classes/{id}/edit', [UserController::class, 'edit'])->name('admin.classes.edit');
    Route::put('/classes/{id}', [UserController::class, 'update'])->name('admin.classes.update');
    Route::delete('/classes/{id}', [UserController::class, 'destroy'])->name('admin.classes.destroy');
    Route::resource('admin/classes', ClassesController::class);

    }); 


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('classes', ClassesController::class);
});