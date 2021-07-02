<?php

use App\Http\Controllers\API\ToDoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [ToDoController::class, 'index'])->name('note.index');
Route::get('/notes', [ToDoController::class, 'index']);
Route::get('/notes/{note}', [ToDoController::class, 'show'])->name('note.show');
Route::post('/notes', [ToDoController::class, 'store'])->name('note.store');
Route::put('/notes/{note}', [ToDoController::class, 'update'])->name('note.update');
Route::delete('/notes/{note}', [ToDoController::class, 'destroy'])->name('note.destroy');
