<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalibrationSeeder extends Seeder {
    public function run(): void {
        DB::table('calibrations')->updateOrInsert(
            ['id' => 1],
            ['name' => 'Default', 'f0' => 3515, 'f1' => 3096, 'f2' => 2957, 'f3' => 3594, 'f4' => 3200, 'b0' => 3530, 'b1' => 3111, 'b2' => 2972, 'b3' => 3609, 'b4' => 3275, 'sf0' => 2.10, 'sf1' => 2.40, 'sf2' => 1.90, 'sf3' => 2.20, 'sf4' => 2.50, 'sb0' => 2.60, 'sb1' => 3.10, 'sb2' => 2.80, 'sb3' => 2.40, 'sb4' => 3.40, 'ax' => 0.00, 'ay' => 0.00, 'az' => 0.00, 'gx' => 0.00, 'gy' => 0.00, 'gz' => 0.00, 'created_at' => '2026-04-23 10:38:54', 'updated_at' => '2026-05-20 00:35:14']
        );
    }
}