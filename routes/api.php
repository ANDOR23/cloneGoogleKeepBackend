<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NoteController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('v1/notes',[NoteController::class, 'getAllNotes']);
Route::post('v1/notes', [NoteController::class, 'setNote']);
Route::put('v1/notes/{id}', [NoteController::class, 'updateNote']);
Route::delete('v1/notes/{id}', [NoteController::class, 'deleteNote']);
Route::get('v1/notes/archived', [NoteController::class, 'archivedNotes']);
Route::post('v1/notes/{id}/archived', [NoteController::class, 'archiveNote']);
