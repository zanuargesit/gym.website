<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserClassesController;
use Illuminate\Support\Facades\Route;


// Route Dashboard
Route::get('/', function () {
    return view('user.dashboard');
});

// Route Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/products', [ProductController::class, 'index'])->name('products');

//route role middleware
Route::group(
    ['middleware' => ['auth', 'role:user']],
    function () {
        Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');

        Route::get('/classes', [ClassesController::class, 'indexUser'])->name('indexUserClasses');

        Route::get('/product', [ProductController::class, 'indexUser'])->name('indexUserProduct');

        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

        Route::get('/member', [MemberController::class, 'index'])->name('member');

        Route::resource('profile', ProfileController::class);
        Route::delete('/profile/{id}/photo', [ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    }
);

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        // mengatur data user 
        Route::get('/users', [UserController::class, 'index'])->name('admin.username.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.username.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.username.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.username.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.username.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.username.destroy');

        // mengatur data clasees
        Route::get('/classes', [ClassesController::class, 'index'])->name('admin.classes.index');
        Route::get('/classes/create', [ClassesController::class, 'create'])->name('admin.classes.create');
        Route::post('/classes', [ClassesController::class, 'store'])->name('admin.classes.store');
        Route::get('/classes/{id}/edit', [ClassesController::class, 'edit'])->name('admin.classes.edit');
        Route::put('/classes/{id}', [ClassesController::class, 'update'])->name('admin.classes.update');
        Route::delete('/classes/{id}', [ClassesController::class, 'destroy'])->name('admin.classes.destroy');
        Route::resource('admin/classes', ClassesController::class);
    });
});


//route role middleware
// Route::middleware(['auth'])->group(
//     function () {
//         Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

//         Route::get('/classes', [ClassesController::class, 'index'])->name('classes');

//         Route::get('/product', [ProductController::class, 'index'])->name('product');

//         Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

//         Route::get('/member', [MemberController::class, 'index'])->name('member');
//     }
// );

// Route::get('/createaccount', function () {
//     return view('account');
// });
// Route::get('/editaccount', function () {
//     return view('account2');
// });
// Route::get('/createclasses', function () {
//     return view('classes1');
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/users', [UserController::class, 'index'])->name('admin.username.index');
//     Route::get('/users/create', [UserController::class, 'create'])->name('admin.username.create');
//     Route::post('/users', [UserController::class, 'store'])->name('admin.username.store');
//     Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.username.edit');
//     Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.username.update');
//     Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.username.destroy');
// });
// Route::prefix('admin')->group(function () {
//     Route::get('/classes', [UserController::class, 'index'])->name('admin.classes.index');
//     Route::get('/classes/create', [UserController::class, 'create'])->name('admin.classes.create');
//     Route::post('/classes', [UserController::class, 'store'])->name('admin.classes.store');
//     Route::get('/classes/{id}/edit', [UserController::class, 'edit'])->name('admin.classes.edit');
//     Route::put('/classes/{id}', [UserController::class, 'update'])->name('admin.classes.update');
//     Route::delete('/classes/{id}', [UserController::class, 'destroy'])->name('admin.classes.destroy');
//     Route::resource('admin/classes', ClassesController::class);
// });


// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('classes', ClassesController::class);
// });

//unauthorized
Route::get('/unauthorized', function () {
    return response('Unauthorized', 403);
})->name('unauthorized');
