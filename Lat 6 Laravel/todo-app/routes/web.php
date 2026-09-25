<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::put('/todos/{todo}/status', [TodoController::class, 'updateStatus'])->name('todos.updateStatus');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');