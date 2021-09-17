<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_centers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upazila_id');
            $table->unsignedBigInteger('vaccine_id');
            $table->unsignedBigInteger('available');
            $table->string('name');
            $table->timestamps();
            $table->foreign('upazila_id')->references('id')->on('upazilas');
            $table->foreign('vaccine_id')->references('id')->on('vaccines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccination_centers');
    }
}
