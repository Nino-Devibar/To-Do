<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TodoController;
use App\Models\Todo;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts', PostController::class);
Route::resource('todos', TodoController::class);
// Route for the index page
Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

// Route for storing new todos
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

// Route for deleting a todo
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

// Route for toggling completion status of a todo (this is the missing route)
Route::put('/todos/{todo}/toggle', [TodoController::class, 'toggle'])->name('todos.toggle');