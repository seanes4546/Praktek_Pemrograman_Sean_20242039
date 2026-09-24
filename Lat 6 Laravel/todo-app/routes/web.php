<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');

Route::get('/todo/{id}', [TodoController::class, 'show'])->name('todo.detail');

