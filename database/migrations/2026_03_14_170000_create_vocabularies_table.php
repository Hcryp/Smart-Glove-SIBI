<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vocabularies', function (Blueprint $table) {
            $table->id(); $table->string('name')->unique();
            for ($i = 1; $i <= 5; $i++) { $table->integer("f{$i}_min")->default(0); $table->integer("f{$i}_max")->default(100); }
            $table->double('ax_min', 8, 2)->default(-10.00); $table->double('ax_max', 8, 2)->default(10.00);
            $table->double('ay_min', 8, 2)->default(-10.00); $table->double('ay_max', 8, 2)->default(10.00);
            $table->double('az_min', 8, 2)->default(-10.00); $table->double('az_max', 8, 2)->default(10.00);
            $table->string('meaning_id'); $table->string('meaning_en')->nullable(); $table->string('meaning_ja')->nullable();
        });
    }
    public function down(): void { Schema::dropIfExists('vocabularies'); }
};