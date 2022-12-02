<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
Route::middleware('isGuest')->group(function () {
Route::get('/', [TodoController::class,'index'])->name('login');
Route::get('/register', [TodoController::class, 'register']);
Route::post('/register', [TodoController::class, 'registerAccount'])->name('register-akun');
Route::post('/login/auth', [TodoController::class, 'auth'])->name('auth');
Route::post('/login/auth', [TodoController::class, 'auth'])->name('auth');
});
Route::middleware('islogin')->prefix('/todo')->name('todo.')->group(function(){
    Route::get('/', [TodoController::class, 'dashboard'])->name('index');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::get('/dashboard.index', [TodoController::class, 'dashboard']);
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('delete');
    Route::patch('/complated/{id}', [TodoController::class, 'updateComplated'])->name('complated');
});

Route::get('/logout', [TodoController::class,'logout'])->name('logout');