<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CasController;
use App\Http\Controllers\StatController;

use Illuminate\Support\Facades\Route;

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

Route::apiResource('regions', RegionController::class);
Route::apiResource('patients', PatientController::class);
Route::apiResource('cas', CasController::class);
Route::apiResource('diseases', DiseaseController::class);
Route::apiResource('stats', StatController::class);




