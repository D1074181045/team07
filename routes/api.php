<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SomatotypesController;
use App\Http\Controllers\VarietiesController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
//    return $request->user();
    Route::get('somatotypes', [SomatotypesController::class, 'api_somatotypes']);
    Route::patch('somatotypes', [SomatotypesController::class, 'api_update']);
    Route::delete('somatotypes', [SomatotypesController::class, 'api_delete']);
    Route::get('varieties', [VarietiesController::class, 'api_varieties']);
    Route::patch('varieties', [VarietiesController::class, 'api_update']);
    Route::delete('varieties', [VarietiesController::class, 'api_delete']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
