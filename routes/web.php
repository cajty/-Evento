<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\StatisticsController;

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

Route::get('/statistics/admin', [StatisticsController::class,'adminStatistic'])->name('statisticsAdmin');
Route::get('/statistics/orga', [StatisticsController::class,'orgaStatistic'])->name('statisticsOrg');





Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/user', [AuthController::class, 'index'])->name('get.user');

Route::middleware(['Visitor'])->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('loginUser');

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/accountCreat', [AuthController::class, 'register'])->name('accountCreat');

    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::middleware(['Admin'])->group(function () {
    Route::get('/events/{event}/validate', [EventController::class, 'eventValidate'])->name('events.validate');
    Route::get('/events/{event}/deactivate', [EventController::class, 'eventDeactivate'])->name('events.deactivate');

    Route::get('/eventsv', [EventController::class, 'eventToValidat'])->name('events.validat');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

  
});
Route::get('/users/{user}/role', [AuthController::class, 'changeRole'])->name('users.role');


Route::get('/events/{event}/show', [EventController::class, 'show'])->name('events.show');

Route::middleware(['User'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');

    Route::get('/searchEvent/{search}', [EventController::class, 'searchEvent'])->name('events.search');
    Route::get('/categoryFilter/{id}', [EventController::class, 'filterEvent'])->name('events.filterEvent');
});
Route::middleware(['Orga'])->group(function () {
    Route::get('/event', [EventController::class, 'eventOfOrga'])->name('events.orga');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/eventsstor', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/eventsu/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});


Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/org', [TicketController::class, 'TicketOfOrg'])->name('tickets.TicketOfOrg');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

Route::get('/user/reservation', [ReservationController::class, 'userReservation'])->name('user.reservation');

Route::post('/reservations/{ticket}', [ReservationController::class, 'store'])->name('reservation.store');


Route::get('/reservations/{event}', [EventController::class, 'eventReservation'])->name('events.reservation');







Route::get('/reservation/{id}/validate',[ReservationController::class,'validateRsra'])->name('reservation.validate');


Route::get('/reservation/{id}/deactivate',[ReservationController::class,'deactivateRsra'] )->name('reservation.deactivate');









