<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VocabularySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vocabularies')->insert([
            ['id' => 1, 'name' => 'a', 'f1_min' => 0, 'f1_max' => 20, 'f2_min' => 60, 'f2_max' => 100, 'f3_min' => 60, 'f3_max' => 100, 'f4_min' => 60, 'f4_max' => 100, 'f5_min' => 60, 'f5_max' => 100, 'ax_min' => 6.00, 'ax_max' => 12.00, 'ay_min' => -6.00, 'ay_max' => 6.00, 'az_min' => -4.00, 'az_max' => 4.00, 'meaning_id' => 'A', 'meaning_en' => 'A', 'meaning_ja' => 'A'],
            ['id' => 2, 'name' => 'i', 'f1_min' => 40, 'f1_max' => 100, 'f2_min' => 80, 'f2_max' => 100, 'f3_min' => 60, 'f3_max' => 100, 'f4_min' => 50, 'f4_max' => 100, 'f5_min' => 0, 'f5_max' => 10, 'ax_min' => 6.00, 'ax_max' => 12.00, 'ay_min' => -6.00, 'ay_max' => 6.00, 'az_min' => -4.00, 'az_max' => 4.00, 'meaning_id' => 'I', 'meaning_en' => 'I', 'meaning_ja' => 'I'],
            ['id' => 3, 'name' => 'u', 'f1_min' => 40, 'f1_max' => 100, 'f2_min' => 0, 'f2_max' => 50, 'f3_min' => 0, 'f3_max' => 50, 'f4_min' => 50, 'f4_max' => 100, 'f5_min' => 40, 'f5_max' => 100, 'ax_min' => 6.00, 'ax_max' => 12.00, 'ay_min' => -6.00, 'ay_max' => 6.00, 'az_min' => -4.00, 'az_max' => 4.00, 'meaning_id' => 'U', 'meaning_en' => 'U', 'meaning_ja' => 'U'],
            ['id' => 4, 'name' => 'e', 'f1_min' => 30, 'f1_max' => 100, 'f2_min' => 30, 'f2_max' => 100, 'f3_min' => 30, 'f3_max' => 100, 'f4_min' => 30, 'f4_max' => 100, 'f5_min' => 30, 'f5_max' => 100, 'ax_min' => 6.00, 'ax_max' => 12.00, 'ay_min' => -6.00, 'ay_max' => 6.00, 'az_min' => -4.00, 'az_max' => 4.00, 'meaning_id' => 'E', 'meaning_en' => 'E', 'meaning_ja' => 'E'],
            ['id' => 5, 'name' => 'o', 'f1_min' => 5, 'f1_max' => 100, 'f2_min' => 9, 'f2_max' => 100, 'f3_min' => 8, 'f3_max' => 100, 'f4_min' => 7, 'f4_max' => 100, 'f5_min' => 6, 'f5_max' => 90, 'ax_min' => -2.00, 'ax_max' => 10.00, 'ay_min' => -6.00, 'ay_max' => 6.00, 'az_min' => 5.00, 'az_max' => 10.00, 'meaning_id' => 'O', 'meaning_en' => 'O', 'meaning_ja' => 'O'],
        ]);
    }
}