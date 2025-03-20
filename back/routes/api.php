<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ApplicationController;
/*
|-------------------------------------------------S-------------------------
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

Route::get('/hello', function () {
    return response()->json(['message' => 'Hello from Laravel tesr!']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// Route::get('/applications', [ApplicationController::class, 'index']);
// Route::get('/applications', [ApplicationController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/applications', [ApplicationController::class, 'index']);
//     Route::post('/applications', [ApplicationController::class, 'store']);
//     Route::get('/applications/{id}', [ApplicationController::class, 'show']);
//     Route::put('/applications/{id}', [ApplicationController::class, 'update']);
//     Route::delete('/applications/{id}', [ApplicationController::class, 'destroy']);
});
