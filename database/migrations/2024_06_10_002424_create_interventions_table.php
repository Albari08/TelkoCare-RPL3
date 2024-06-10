<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('medical_record_id')->unsigned();
            $table->text('intervention');
            $table->timestamps();

            $table->foreign('medical_record_id')->references('id')->on('medical_records')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('interventions');
    }
}
