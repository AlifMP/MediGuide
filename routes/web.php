<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\chatController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\userChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\dokterChatController;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/login', [LoginController::class, 'indexLog'])->name('login');
Route::post('/login', [LoginController::class, 'prosesLog']);
Route::get('/register', [RegisterController::class, 'indexReg'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'prosesReg']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/blogs', [BlogsController::class, 'index']);
Route::get('/search', [BlogsController::class, 'index'])->name('search');
Route::get('/blogs/{slug}', [BlogsController::class, 'detail']);
// Route::group(['middleware' => ['auth', 'checkRole:user, doctor']], function () {
// });
Route::group(['middleware' => ['auth', 'checkRole:user']], function () {
    Route::get('/profile', [DashboardController::class, 'profile']);
    Route::get('/addprofile', [DashboardController::class, 'addprofile']);
    Route::post('/addprofile', [DashboardController::class, 'addprofilePost']);
    Route::get('/chat', [userChatController::class, 'index'])->name('user.chats');
    Route::get('/chat/{id}', [userChatController::class, 'chat'])->name('user.chat');
    Route::post('/sendmessage', [userChatController::class, 'sendMessage'])->name('user.send.message');
    // Route::get('/chat', [chatController::class, 'index']);
    // Route::get('/chat/{id}', [chatController::class, 'getDoctor']);
    // Route::post('/storemessage', [chatController::class, 'store'])->name('store.message');
});

Route::group(['middleware' => ['auth', 'checkRole:doctor']], function () {
    Route::get('/dashboard/doctor', [DashboardController::class, 'dochome']);
    Route::get('/blogsdoc', [BlogsController::class, 'indexdoc']);
    Route::get('/blogsdoc/{slug}', [BlogsController::class, 'detaildoc']);
    Route::get('/chats', [dokterChatController::class, 'index'])->name('doctor.chats');
    Route::get('/chats/{id}', [dokterChatController::class, 'chat'])->name('doctor.chat');
    Route::post('/send-message', [dokterChatController::class, 'sendMessage'])->name('doctor.send.message');
    // Route::get('/chats', [chatController::class, 'indexdoc']);
    // Route::get('/chats/{id}', [chatController::class, 'getKlien']);
    // Route::post('/store-message', [chatController::class, 'storedoc'])->name('store.message');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'admindashboard']);
    Route::get('/articles', [DashboardController::class, 'adminArticles']);
    Route::get('/users', [DashboardController::class, 'adminUsers']);
    Route::get('/addarticle', [DashboardController::class, 'addArticles']);
    Route::post('/addarticle', [DashboardController::class, 'addArticlesPost']);
    Route::get('/edit/{id}', [DashboardController::class, 'editArticles']);
    Route::post('/edit', [DashboardController::class, 'editArticlesPut']);
    Route::get('/delete/{id}', [DashboardController::class, 'deleteArticles']);
    Route::get('/adduser', [DashboardController::class, 'addUsers']);
    Route::post('/adduser', [DashboardController::class, 'addUsersPost']);
    Route::get('/edit/user/{id}', [DashboardController::class, 'editUsers']);
    Route::post('/edit/user', [DashboardController::class, 'editUsersPut']);
    Route::get('/delete/user/{id}', [DashboardController::class, 'deleteUsers']);

    Route::get('/articles/search', [DashboardController::class, 'searchArticles'])->name('articles.search');
});
