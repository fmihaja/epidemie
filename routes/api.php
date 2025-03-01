<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\PatientController;
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

// Route::apiResource('patients', PatientController::class);
// Route::apiResource('cases', CasePatientController::class);
Route::apiResource('regions', RegionController::class);

// Disease routes
Route::apiResource('diseases', DiseaseController::class);

// Patient routes
Route::apiResource('patients', PatientController::class);

// Case routes
Route::apiResource('cases', CasController::class);

Route::prefix('stats')->group(function () {
    Route::get('disease-status', [StatController::class, 'diseaseStatusStats']);
    Route::get('disease/{diseaseId}', [StatController::class, 'diseaseStats']);
    Route::get('regions', [StatController::class, 'regionStats']);
    Route::get('global', [StatController::class, 'globalStats']);
});