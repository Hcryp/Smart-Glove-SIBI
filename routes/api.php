<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CalibrationController;
use App\Http\Controllers\Api\VocabularyController;
use App\Http\Controllers\Api\TranslationController;

Route::middleware('auth:sanctum')->get('/user', fn(Request $request) => $request->user());

Route::prefix('calibrations')->group(function () {
    Route::get('/', [CalibrationController::class, 'index']);
    Route::get('/active', [CalibrationController::class, 'active']);
    Route::get('/{name}', [CalibrationController::class, 'show']);
    Route::post('/', [CalibrationController::class, 'store']);
});

Route::prefix('vocabularies')->group(function () {
    Route::get('/', [VocabularyController::class, 'index']);
    Route::post('/save', [VocabularyController::class, 'store']);
    Route::delete('/{id}', [VocabularyController::class, 'destroy']);
});

Route::post('/translate', [TranslationController::class, 'translate']);