<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ProfileController;
use Inertia\Inertia;

use App\Http\Controllers\Register2Controller;

use App\Http\Middleware\HandleInertiaRequests;

// Route::get('/', function () {
//     //return view('app');
//     return Inertia::render('Index');
// });

// Página estática (index)
// Route::get('/', function () {
//     return Inertia::render('Index');
// });


// Rotas estáticas
Route::get('/', [HomeController::class, 'index']);

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas de registro
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth', 'verified');
Route::post('/dashboard', [DashboardController::class, 'storeCategory'])->name('dashboard.create.category')->middleware('auth', 'verified');
Route::get('/dashboard/list/categories', [DashboardController::class, 'listCategory'])->name('dashboard.list.category')->middleware('auth', 'verified');
Route::put('/dashboard/category/', [DashboardController::class, 'updateCategory'])->name('categories.update')->middleware('auth', 'verified');
Route::delete('/dashboard/category/', [DashboardController::class, 'deleteCategory'])->name('categories.delete')->middleware('auth', 'verified');

Route::get('/dashboard/list/bookmark/{uuid}', [BookmarkController::class, 'index'])->name('dashboard.list.bookmark')->middleware('auth', 'verified');
Route::post('/dashboard/create/bookmark', [BookmarkController::class, 'store'])->name('dashboard.create.bookmark')->middleware('auth', 'verified');
Route::post('/dashboard/getlink/bookmark', [BookmarkController::class, 'getlink'])->name('dashboard.getlink.bookmark')->middleware('auth', 'verified');
Route::put('/dashboard/update/bookmark', [BookmarkController::class, 'update'])->name('dashboard.update.bookmark')->middleware('auth', 'verified');
Route::put('/dashboard/bookmarks/{bookmark}/featured', [BookmarkController::class, 'asFeatured'])->name('dashboard.bookmarks.featured')->middleware('auth', 'verified');
Route::delete('/dashboard/delete/bookmark', [BookmarkController::class, 'delete'])->name('dashboard.delete.bookmark')->middleware('auth', 'verified');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request')->middleware('auth', 'verified');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('auth', 'verified');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset')->middleware('auth', 'verified');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update')->middleware('auth', 'verified');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth', 'verified');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth', 'verified');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword')->middleware('auth', 'verified');

Route::get('/show', function () {
    return Inertia::render('Index');
});

