<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Calibration;
use App\Models\Vocabulary;

Route::get('/', fn() => view('dashboard'));

Route::prefix('api')->group(function () {
    Route::get('/calibrations', fn() => response()->json(Calibration::all()));
    Route::get('/calibrations/{name}', fn($name) => ($cal = Calibration::where('name', $name)->first()) ? response()->json($cal) : response()->json(['error' => 'Not found'], 404));
    
    Route::post('/calibrations', function (Request $request) {
        $request->validate(['name' => 'required|string']);
        return response()->json(['status' => 'success', 'data' => Calibration::updateOrCreate(['name' => $request->name], $request->except('_token'))]);
    });

    Route::get('/vocabularies', fn() => response()->json(Vocabulary::all()));
    
    Route::post('/vocabularies/save', function (Request $request) {
        $data = $request->validate([
            'name' => 'required|string', 
            'meaning_id' => 'required|string', 
            'meaning_en' => 'nullable|string', 
            'meaning_ja' => 'nullable|string',
            'f1_min' => 'required|integer', 'f1_max' => 'required|integer', 
            'f2_min' => 'required|integer', 'f2_max' => 'required|integer',
            'f3_min' => 'required|integer', 'f3_max' => 'required|integer', 
            'f4_min' => 'required|integer', 'f4_max' => 'required|integer',
            'f5_min' => 'required|integer', 'f5_max' => 'required|integer',
            'ax_min' => 'required|numeric', 'ax_max' => 'required|numeric', 
            'ay_min' => 'required|numeric', 'ay_max' => 'required|numeric', 
            'az_min' => 'required|numeric', 'az_max' => 'required|numeric'
        ]);
        return response()->json(Vocabulary::updateOrCreate(['id' => $request->id], $data));
    });

    Route::delete('/vocabularies/{id}', fn($id) => response()->json(Vocabulary::destroy($id)));

    Route::post('/translate', function (Request $request) {
        $request->validate(['text' => 'required|string', 'target' => 'required|string']);
        if ($request->target === 'id') return response()->json(['translated' => $request->text, 'target' => 'id']);
        try {
            $res = Http::get('https://translate.googleapis.com/translate_a/single', [
                'client' => 'gtx', 
                'sl' => 'id', 
                'tl' => $request->target, 
                'dt' => 't', 
                'q' => $request->text
            ]);
            if ($res->successful()) return response()->json(['translated' => $res->json()[0][0][0] ?? $request->text, 'target' => $request->target]);
        } catch (\Exception $e) {}
        return response()->json(['translated' => $request->text, 'target' => $request->target], 500);
    });
});