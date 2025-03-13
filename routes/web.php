<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* **************************************************** */
/* Frontend Routes - Rutas para los usuarios en general */
/* **************************************************** */
Route::get('/', [FrontendController::class, 'index'])->middleware('localization')->name('home');

// Set Language
Route::get('/locale/{locale}', [LocalizationController::class, 'setLanguage'])->name('locale');

/* ********************************* */
/* Rutas de User - User Dashboard   */
/* ********************************* */
// En middleware para pasar un parámetro se hace con :parámetro
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:user'], 'prefix' => 'user', 'as' => 'user.'], function(){


    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // Route::get('/become-instructor', [StudentDashboardController::class, 'becomeInstructor'])->name('become-instructor');
    // Route::post('/become-instructor/{user}', [StudentDashboardController::class, 'becomeInstructorUpdate'])->name('become-instructor.update');

    // // Profile Routes
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // Route::post('/profile/update/{id}', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    // Route::post('/profile/update-password', [ProfileController::class, 'profileUpdatePassword'])->name('profile.update-password');
    // Route::post('/profile/update-social-media', [ProfileController::class, 'profileUpdateSocialMedia'])->name('profile.update-social-media');

});

/* ********************************* */
/* Rutas de instructor - instructor. */
/* ********************************* */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function(){

    Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/salir', [InstructorDashboardController::class, 'salir'])->name('dashboard.salir');

    // // Profile Routes
    // Route::get('/profile', [ProfileController::class, 'instructorIndex'])->name('profile.index');
    // Route::post('/profile/update/{id}', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    // Route::post('/profile/update-password', [ProfileController::class, 'profileUpdatePassword'])->name('profile.update-password');
    // Route::post('/profile/update-social-media', [ProfileController::class, 'profileUpdateSocialMedia'])->name('profile.update-social-media');

    // // Courses Routes
    // Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    // Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    // Route::post('/courses/create/store', [CourseController::class, 'storeBasicInput'])->name('courses.store-basic-input');
    // Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    // Route::post('/courses/update', [CourseController::class, 'update'])->name('courses.update');

});










/* ********************************* */
/* Basic Includes */
/* ********************************* */

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
