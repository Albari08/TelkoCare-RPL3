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
        Schema::table('resep_details', function (Blueprint $table) {
            $table->enum('status', ['Undefined', 'Available', 'Not Available'])->default('Undefined');
        });
        Schema::table('resep_detail_temp', function (Blueprint $table) {
            $table->enum('status', ['Undefined', 'Available', 'Not Available'])->default('Undefined');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resep_details', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('resep_detail_temp', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
