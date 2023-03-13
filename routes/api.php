<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RateController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//recipe 
Route::post('insertrecipes', [RecipeController::class, 'insert']);
Route::get('listrecipe', [RecipeController::class, 'select']);
Route::get('listrecipe/{id}', [RecipeController::class, 'selectbyid']);
Route::patch('updaterecipe/{id}', [RecipeController::class, 'update']);
Route::delete('deleterecipe/{id}', [RecipeController::class, 'deelete']);
//rating added api
Route::post('insertrating', [RateController::class, 'insert']);


