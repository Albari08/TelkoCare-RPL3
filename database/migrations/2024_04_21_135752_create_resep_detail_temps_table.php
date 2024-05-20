<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resep_detail_temp', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('nama_alias_obat')->nullable();
            $table->string('rute')->nullable();
            $table->integer('qty');
            $table->string('aturan_pakai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_detail_temp');
    }
};
