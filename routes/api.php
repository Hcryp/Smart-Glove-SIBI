<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Calibration;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) { return $request->user(); });
Route::get('/calibration/active', function () { return response()->json(Calibration::latest()->first()); });