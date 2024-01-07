<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Api\ApiController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('administrator', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('administrator', [LoginController::class, 'login'])->name('admin.login.control');



//api
Route::get('api/countries', [ApiController::class, 'countries'])->name('api.countries');
Route::get('api/cities/{id}', [ApiController::class, 'cities'])->name('api.cities');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('logout', [AdminDashboardController::class, 'logout'])->name('admin.logout');
    Route::get('users', [AdminDashboardController::class, 'users'])->name('admin.users');
    Route::get('users-delete/{id}', [AdminDashboardController::class, 'usersDelete'])->name('admin.users.delete');
});
