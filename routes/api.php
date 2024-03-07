<?php

use App\Http\Controllers\Api\DestinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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
Route::middleware(['cors'])->group(function () {
Route::get('/',[DestinationController::class,'index']);
});

<<<<<<< HEAD
Route::get('/destinations/{id}', [DestinationController::class, 'show']);


Route::get('/search', [DestinationController::class, 'search']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('user/logout', [AuthController::class, 'logout']);
});
=======
Route::get('/',[DestinationController::class,'index']);
>>>>>>> feature_pagination
