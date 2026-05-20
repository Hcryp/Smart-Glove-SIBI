<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Calibration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalibrationController extends Controller {
    public function index() { return response()->json(Calibration::select('id', 'name', 'created_at')->get()); }
    public function active() { return response()->json(Calibration::latest()->first()); }
    public function show($name) {
        $cal = Calibration::where('name', $name)->first();
        return $cal ? response()->json($cal) : response()->json(['error' => 'Not found'], 404);
    }
    public function store(Request $request) {
        $validated = $request->validate(['name' => 'required|string']);
        $data = $request->only(['f0', 'f1', 'f2', 'f3', 'f4', 'b0', 'b1', 'b2', 'b3', 'b4', 'sf0', 'sf1', 'sf2', 'sf3', 'sf4', 'sb0', 'sb1', 'sb2', 'sb3', 'sb4', 'ax', 'ay', 'az', 'gx', 'gy', 'gz']);
        $result = DB::transaction(fn() => Calibration::updateOrCreate(['name' => $validated['name']], $data));
        return response()->json(['status' => 'success', 'data' => $result]);
    }
}