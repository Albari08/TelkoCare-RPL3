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
        Schema::dropIfExists('jadwal_dokters');

        Schema::create('jadwal_dokters', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->foreignId('dokter_id')->constrained('dokters')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_dokter');
    }
};
