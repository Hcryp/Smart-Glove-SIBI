<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class TranslationController extends Controller {
    public function translate(Request $request) {
        $request->validate(['text' => 'required|string', 'target' => 'required|string']);
        if ($request->target === 'id') return response()->json(['translated' => $request->text, 'target' => 'id']);
        $cacheKey = 'trans_' . md5($request->text . '_' . $request->target);
        if (Cache::has($cacheKey)) return response()->json(['translated' => Cache::get($cacheKey), 'target' => $request->target, 'cached' => true]);
        try {
            $res = Http::timeout(5)->get('https://translate.googleapis.com/translate_a/single', ['client' => 'gtx', 'sl' => 'id', 'tl' => $request->target, 'dt' => 't', 'q' => $request->text]);
            if ($res->successful()) {
                $translatedText = $res->json()[0][0][0] ?? $request->text;
                Cache::put($cacheKey, $translatedText, 3600);
                return response()->json(['translated' => $translatedText, 'target' => $request->target]);
            }
        } catch (\Exception $e) { Log::error('Translation Gateway Timeout/Error: ' . $e->getMessage()); }
        return response()->json(['translated' => $request->text, 'target' => $request->target], 500);
    }
}