<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vocabulary;

class VocabularySeeder extends Seeder {
    public function run(): void {
        $vocabularies = [
            ['name' => 'a', 'meaning_id' => 'A', 'meaning_en' => 'A', 'meaning_ja' => 'A', 'f1_min' => 0, 'f1_max' => 40, 'f2_min' => 60, 'f2_max' => 100, 'f3_min' => 60, 'f3_max' => 100, 'f4_min' => 60, 'f4_max' => 100, 'f5_min' => 60, 'f5_max' => 100, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'i', 'meaning_id' => 'I', 'meaning_en' => 'I', 'meaning_ja' => 'I', 'f1_min' => 60, 'f1_max' => 100, 'f2_min' => 60, 'f2_max' => 100, 'f3_min' => 60, 'f3_max' => 100, 'f4_min' => 60, 'f4_max' => 100, 'f5_min' => 0, 'f5_max' => 40, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'u', 'meaning_id' => 'U', 'meaning_en' => 'U', 'meaning_ja' => 'U', 'f1_min' => 60, 'f1_max' => 100, 'f2_min' => 0, 'f2_max' => 40, 'f3_min' => 0, 'f3_max' => 40, 'f4_min' => 60, 'f4_max' => 100, 'f5_min' => 60, 'f5_max' => 100, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'e', 'meaning_id' => 'E', 'meaning_en' => 'E', 'meaning_ja' => 'E', 'f1_min' => 40, 'f1_max' => 80, 'f2_min' => 40, 'f2_max' => 80, 'f3_min' => 40, 'f3_max' => 80, 'f4_min' => 40, 'f4_max' => 80, 'f5_min' => 40, 'f5_max' => 80, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'o', 'meaning_id' => 'O', 'meaning_en' => 'O', 'meaning_ja' => 'O', 'f1_min' => 30, 'f1_max' => 70, 'f2_min' => 30, 'f2_max' => 70, 'f3_min' => 30, 'f3_max' => 70, 'f4_min' => 30, 'f4_max' => 70, 'f5_min' => 30, 'f5_max' => 70, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],

            ['name' => 'h', 'meaning_id' => 'H', 'meaning_en' => 'H', 'meaning_ja' => 'H', 'f1_min' => 60, 'f1_max' => 100, 'f2_min' => 0, 'f2_max' => 40, 'f3_min' => 0, 'f3_max' => 40, 'f4_min' => 60, 'f4_max' => 100, 'f5_min' => 60, 'f5_max' => 100, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'n', 'meaning_id' => 'N', 'meaning_en' => 'N', 'meaning_ja' => 'N', 'f1_min' => 60, 'f1_max' => 100, 'f2_min' => 40, 'f2_max' => 80, 'f3_min' => 40, 'f3_max' => 80, 'f4_min' => 60, 'f4_max' => 100, 'f5_min' => 60, 'f5_max' => 100, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'd', 'meaning_id' => 'D', 'meaning_en' => 'D', 'meaning_ja' => 'D', 'f1_min' => 50, 'f1_max' => 100, 'f2_min' => 0, 'f2_max' => 30, 'f3_min' => 50, 'f3_max' => 100, 'f4_min' => 50, 'f4_max' => 100, 'f5_min' => 50, 'f5_max' => 100, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'y', 'meaning_id' => 'Y', 'meaning_en' => 'Y', 'meaning_ja' => 'Y', 'f1_min' => 0, 'f1_max' => 40, 'f2_min' => 60, 'f2_max' => 100, 'f3_min' => 60, 'f3_max' => 100, 'f4_min' => 60, 'f4_max' => 100, 'f5_min' => 0, 'f5_max' => 40, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],

            ['name' => 'saya', 'meaning_id' => 'Saya', 'meaning_en' => 'I/Me', 'meaning_ja' => 'Watashi', 'f1_min' => 0, 'f1_max' => 40, 'f2_min' => 0, 'f2_max' => 40, 'f3_min' => 0, 'f3_max' => 40, 'f4_min' => 0, 'f4_max' => 40, 'f5_min' => 0, 'f5_max' => 40, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'perkenalkan', 'meaning_id' => 'Perkenalkan', 'meaning_en' => 'Introduce', 'meaning_ja' => 'Shoukai', 'f1_min' => 0, 'f1_max' => 30, 'f2_min' => 0, 'f2_max' => 30, 'f3_min' => 0, 'f3_max' => 30, 'f4_min' => 0, 'f4_max' => 30, 'f5_min' => 0, 'f5_max' => 30, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'terima', 'meaning_id' => 'Terima', 'meaning_en' => 'Receive', 'meaning_ja' => 'Ukeru', 'f1_min' => 40, 'f1_max' => 80, 'f2_min' => 40, 'f2_max' => 80, 'f3_min' => 40, 'f3_max' => 80, 'f4_min' => 40, 'f4_max' => 80, 'f5_min' => 40, 'f5_max' => 80, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'kasih', 'meaning_id' => 'Kasih', 'meaning_en' => 'Love/Give', 'meaning_ja' => 'Ai', 'f1_min' => 0, 'f1_max' => 40, 'f2_min' => 0, 'f2_max' => 40, 'f3_min' => 0, 'f3_max' => 40, 'f4_min' => 0, 'f4_max' => 40, 'f5_min' => 0, 'f5_max' => 40, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'selamat', 'meaning_id' => 'Selamat', 'meaning_en' => 'Safe/Congrats', 'meaning_ja' => 'Omedetou', 'f1_min' => 0, 'f1_max' => 30, 'f2_min' => 0, 'f2_max' => 30, 'f3_min' => 0, 'f3_max' => 30, 'f4_min' => 0, 'f4_max' => 30, 'f5_min' => 0, 'f5_max' => 30, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'berjuang', 'meaning_id' => 'Berjuang', 'meaning_en' => 'Struggle', 'meaning_ja' => 'Tatakau', 'f1_min' => 70, 'f1_max' => 100, 'f2_min' => 70, 'f2_max' => 100, 'f3_min' => 70, 'f3_max' => 100, 'f4_min' => 70, 'f4_max' => 100, 'f5_min' => 70, 'f5_max' => 100, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0],
            ['name' => 'sukses', 'meaning_id' => 'Sukses', 'meaning_en' => 'Success', 'meaning_ja' => 'Seikou', 'f1_min' => 0, 'f1_max' => 40, 'f2_min' => 70, 'f2_max' => 100, 'f3_min' => 70, 'f3_max' => 100, 'f4_min' => 70, 'f4_max' => 100, 'f5_min' => 70, 'f5_max' => 100, 'ax_min' => -1.0, 'ax_max' => 1.0, 'ay_min' => -1.0, 'ay_max' => 1.0, 'az_min' => -1.0, 'az_max' => 1.0]
        ];

        foreach ($vocabularies as $vocab) { 
            Vocabulary::updateOrCreate(['name' => $vocab['name']], $vocab); 
        }
    }
}