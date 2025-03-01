<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DiseaseRegionController;
use App\Http\Controllers\RegionController;

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

<<<<<<< HEAD
Route::apiResource('regions', RegionController::class);
Route::apiResource('patients', PatientController::class);
Route::apiResource('case_patients', CasePatientController::class);
Route::apiResource('case_contacts', CaseContactController::class);
=======
Route::apiResource('disease_regions', DiseaseRegionController::class);
Route::apiResource('regions', RegionController::class);
Route::apiResource('patients', PatientController::class);
Route::apiResource('patients', PatientController::class);
>>>>>>> main


