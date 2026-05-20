<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('vocabularies', function (Blueprint $table) { $table->id(); $table->string('name')->unique(); for($i=1; $i<=5; $i++) { $table->integer("f{$i}_min")->default(0); $table->integer("f{$i}_max")->default(100); } $table->float('ax_min')->default(-10.0); $table->float('ax_max')->default(10.0); $table->float('ay_min')->default(-10.0); $table->float('ay_max')->default(10.0); $table->float('az_min')->default(-10.0); $table->float('az_max')->default(10.0); $table->string('meaning_id'); $table->string('meaning_en')->nullable(); $table->string('meaning_ja')->nullable(); }); }
    public function down(): void { Schema::dropIfExists('vocabularies'); }
};