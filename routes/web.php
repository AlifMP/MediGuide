<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodolistController;
use Illuminate\Auth\Events\Registered;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/login', [LoginController::class, 'indexLog'])->name('login');
Route::post('/login', [LoginController::class, 'prosesLog']);
Route::get('/register', [RegisterController::class, 'indexReg'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'prosesReg']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::group(['middleware' => ['auth', 'checkRole:user, doctor']], function () {
});
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'admindashboard']);
    Route::get('/articles', [DashboardController::class, 'adminArticles']);
    Route::get('/users', [DashboardController::class, 'adminUsers']);
});
