<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Vocabulary;
use App\Http\Requests\StoreVocabularyRequest;
use Illuminate\Support\Facades\DB;

class VocabularyController extends Controller {
    public function index() { return response()->json(Vocabulary::all()); }
    public function store(StoreVocabularyRequest $request) {
        $result = DB::transaction(fn() => Vocabulary::updateOrCreate(['id' => $request->id], $request->validated()));
        return response()->json($result);
    }
    public function destroy($id) { return response()->json(DB::transaction(fn() => Vocabulary::destroy($id))); }
}