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
            $table->float('sf0')->default(2.1); $table->float('sf1')->default(2.4); $table->float('sf2')->default(1.9); $table->float('sf3')->default(2.2); $table->float('sf4')->default(2.5);
            $table->float('sb0')->default(2.6); $table->float('sb1')->default(3.1); $table->float('sb2')->default(2.8); $table->float('sb3')->default(2.4); $table->float('sb4')->default(3.4);
            $table->float('ax')->default(0); $table->float('ay')->default(0); $table->float('az')->default(0);
            $table->float('gx')->default(0.013); $table->float('gy')->default(0.128); $table->float('gz')->default(-0.006);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('calibrations'); }
};