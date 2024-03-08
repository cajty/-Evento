<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/home', function () {
    return view('tickeForm');
});




Route::get('/events/{event}/validate', [EventController::class, 'eventValidate'])->name('events.validate');
Route::get('/events/{event}/deactivate', [EventController::class, 'eventDeactivate'])->name('events.deactivate');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/eventsstor', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/eventsu/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/eventsv', [EventController::class, 'eventToValidat'])->name('events.validat');
Route::get('/event.is.validat/{event}', [EventController::class, 'eventIsValid'])->name('event.is.validat');
Route::get('/eventso', [EventController::class, 'eventOfOrga'])->name('events.orga');
Route::get('/searchEvent/{search}', [EventController::class, 'searchEvent'])->name('events.search');
Route::get('/categoryFilter/{id}', [EventController::class, 'filterEvent'])->name('events.filterEvent');








Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/accountCreat', [AuthController::class, 'register'])->name('accountCreat');


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginUser');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/user', [AuthController::class, 'index'])->name('get.user');
Route::delete('/users/{user}', [AuthController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{user}/role', [AuthController::class, 'changeRole'])->name('users.role');







Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
