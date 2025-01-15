<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\classCartController;
use App\Http\Controllers\AdminJoinClassController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserClassesController;
use App\Http\Controllers\TrainerProfileController;
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

Route::group(['middleware' => ['auth', 'role:trainer']], function () {
    Route::get('/trainer/profile', [TrainerProfileController::class, 'index'])->name('trainer.profile');
    Route::put('/trainer/profile/{id}', [TrainerProfileController::class, 'updateTrainerProfile'])->name('trainer.profile.update');
    Route::delete('/trainer/profile/{id}/photo', [TrainerProfileController::class, 'deletePhoto'])->name('trainer.profile.deletePhoto');
});



Route::get('/products', [ProductController::class, 'index'])->name('products');

//route role middleware
Route::group(
    ['middleware' => ['auth', 'role:user']],
    function () {
        Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');

        Route::get('/classes', [ClassesController::class, 'indexUser'])->name('indexUserClasses');

        Route::get('/product', [ProductController::class, 'indexUser'])->name('indexUserProduct');

        Route::get('/feedback', [CommentController::class, 'index'])->name('feedback');

        Route::get('/member', [MemberController::class, 'index'])->name('member');


        Route::post('/classes/join/{classId}', [ClassCartController::class, 'joinClass'])->name('classes.joinClass');

        Route::get('/user/classes', [ClassesController::class, 'indexUser'])->name('user.classes.index');

        Route::get('/admin/classes', [ClassesController::class, 'index'])->name('admin.classes.index');

        Route::get('/comments', [CommentController::class, 'index'])->name('menu.comment');
        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

        Route::resource('profile', ProfileController::class);
        Route::delete('/profile/{id}/photo', [ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
        Route::get('/user/classes', [ClassesController::class, 'indexUser'])->name('user.profile.index');

        // Menghapus kelas yang diikuti
        Route::delete('/joinclasses/{id}', [AdminJoinClassController::class, 'destroy'])->name('admin.joinclasses.destroy');
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

        Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
        Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
        // mengatur data clasees
        Route::get('/classes', [ClassesController::class, 'index'])->name('admin.classes.index');
        Route::get('/classes/create', [ClassesController::class, 'create'])->name('admin.classes.create');
        Route::post('/classes', [ClassesController::class, 'store'])->name('admin.classes.store');
        Route::get('/classes/{id}/edit', [ClassesController::class, 'edit'])->name('admin.classes.edit');
        Route::put('/classes/{id}', [ClassesController::class, 'update'])->name('admin.classes.update');
        Route::delete('/classes/{id}', [ClassesController::class, 'destroy'])->name('admin.classes.destroy');
        Route::resource('admin/classes', ClassesController::class);

        Route::get('/store', [ProductController::class, 'index'])->name('admin.store.index');
        Route::get('/store/create', [ProductController::class, 'create'])->name('admin.store.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.store.store');
        Route::get('/store/{id}/edit', [ProductController::class, 'edit'])->name('admin.store.edit');
        Route::put('/store/{id}', [ProductController::class, 'update'])->name('admin.store.update');
        Route::delete('/store/{id}', [ProductController::class, 'destroy'])->name('admin.store.destroy');
        Route::resource('admin/store', ProductController::class);

 
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
