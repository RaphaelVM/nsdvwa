<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\NotesController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [App\Http\Controllers\NotesController::class, 'create'])->name('notes.create');
Route::post('/notes/edit', [App\Http\Controllers\NotesController::class, 'edit'])->name('notes.edit');
Route::post('/notes/update', [App\Http\Controllers\NotesController::class, 'update'])->name('notes.update');
Route::post('/notes/store', [App\Http\Controllers\NotesController::class, 'store'])->name('notes.store');
Route::post('/notes/destroy', [App\Http\Controllers\NotesController::class, 'destroy'])->name('notes.destroy');

