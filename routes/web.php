<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodolistController;

Route::get('/', [DashboardController::class, 'home']);
