<?php

use App\Http\Controllers\MockApiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MockApiController::class, 'index']);
Route::get('create-data', [MockApiController::class, 'createForm']);
Route::post('create-data', [MockApiController::class, 'createData']);

Route::get('edit-data/{id}', [MockApiController::class, 'editForm']);
Route::put('/edit-data/{id}', [MockApiController::class, 'editData'])->name('edit-data');

// Route::get('delete/{id}', [MockApiController::class, 'deleteForm']);
// Route::delete('delete/{id}', [MockApiController::class, 'delete'])->name('delete-user');
Route::delete('/users/{id}', [MockApiController::class, 'delete'])->name('delete-user');
// Route::delete('/users/{id}', [UserController::class, 'delete'])->name('delete-user');
