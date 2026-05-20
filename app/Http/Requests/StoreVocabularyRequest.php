<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreVocabularyRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
        return [
            'name' => 'required|string', 'meaning_id' => 'required|string', 'meaning_en' => 'nullable|string', 'meaning_ja' => 'nullable|string',
            'f1_min' => 'required|integer', 'f1_max' => 'required|integer', 'f2_min' => 'required|integer', 'f2_max' => 'required|integer',
            'f3_min' => 'required|integer', 'f3_max' => 'required|integer', 'f4_min' => 'required|integer', 'f4_max' => 'required|integer',
            'f5_min' => 'required|integer', 'f5_max' => 'required|integer',
            'ax_min' => 'required|numeric', 'ax_max' => 'required|numeric', 'ay_min' => 'required|numeric', 'ay_max' => 'required|numeric', 'az_min' => 'required|numeric', 'az_max' => 'required|numeric'
        ];
    }
}