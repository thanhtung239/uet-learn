<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\CourseTagController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Google Sign In
Route::get('/google', [LoginController::class, 'redirectToGoogle'])->name('google.url');
Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::resource('courses', CourseController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('course-users', CourseUserController::class)->only(['store', 'destroy']);
    Route::resource('course-tags', CourseTagController::class)->only(['store']);
    Route::resource('reviews', ReviewController::class)->only(['store']);
    Route::resource('course.lessons', LessonController::class);
    Route::resource('users', UserController::class);
    Route::resource('lessons.documents', DocumentController::class);

    Route::post('/documents/learned', [DocumentController::class, 'learn']);
    Route::get('/documents/{id}/show', [DocumentController::class, 'show'])->name('documents.show');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showAdminLoginForm'])->name('admin.show_login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::resource('management', AccountManagementController::class)->only(['index', 'destroy'])->middleware(['auth', 'admin']);
    Route::post('/approve-course/{id}', [CourseController::class, 'approveCourse'])->name('approve_course')->middleware(['auth', 'admin']);
    Route::post('/management/users/delete', [AccountManagementController::class, 'deleteUser'])->name('delete_user')->middleware(['auth', 'admin']);
    Route::post('/management/users/edit', [AccountManagementController::class, 'editUser'])->name('edit_user')->middleware(['auth', 'admin']);
    Route::post('/management/courses/delete', [AccountManagementController::class, 'deleteCourse'])->name('delete_course')->middleware(['auth', 'admin']);
    Route::get('/check-notification/{id}', [AccountManagementController::class, 'checkedNotification'])->middleware(['auth', 'admin']);
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('admin', AdminController::class)->only(['index']);
});
