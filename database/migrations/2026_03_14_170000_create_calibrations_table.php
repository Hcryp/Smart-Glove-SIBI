<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('calibrations', function (Blueprint $table) {
            $table->id(); $table->string('name')->unique();
            $table->integer('f0')->default(3683); $table->integer('f1')->default(3106); $table->integer('f2')->default(2928); $table->integer('f3')->default(3715); $table->integer('f4')->default(3215);
            $table->integer('b0')->default(3692); $table->integer('b1')->default(3123); $table->integer('b2')->default(2953); $table->integer('b3')->default(3727); $table->integer('b4')->default(3285);
            $table->double('sf0', 8, 2)->default(2.10); $table->double('sf1', 8, 2)->default(2.40); $table->double('sf2', 8, 2)->default(1.90); $table->double('sf3', 8, 2)->default(2.20); $table->double('sf4', 8, 2)->default(2.50);
            $table->double('sb0', 8, 2)->default(2.60); $table->double('sb1', 8, 2)->default(3.10); $table->double('sb2', 8, 2)->default(2.80); $table->double('sb3', 8, 2)->default(2.40); $table->double('sb4', 8, 2)->default(3.40);
            $table->double('ax', 8, 2)->default(0.00); $table->double('ay', 8, 2)->default(0.00); $table->double('az', 8, 2)->default(0.00);
            $table->double('gx', 8, 2)->default(0.01); $table->double('gy', 8, 2)->default(0.13); $table->double('gz', 8, 2)->default(-0.01);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('calibrations'); }
};