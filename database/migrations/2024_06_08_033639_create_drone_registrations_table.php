<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroneRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('drone_registrations', function (Blueprint $table) {
            $table->id();
            // Part 1: PDF File Upload
            $table->string('ct26')->nullable();
            $table->string('ct30')->nullable();
            $table->string('certificate')->nullable();
            $table->string('personal_information_form')->nullable();
            $table->string('request_for_registration')->nullable();
            // Part 2: Picture Upload
            $table->string('drone_photography')->nullable();
            $table->string('remote_photo')->nullable();
            $table->string('photo_serial_number')->nullable();
            // Part 3: Additional Documents Upload
            $table->string('nbtc_documents')->nullable();
            $table->string('caa_documents')->nullable();
            $table->string('other_documents')->nullable();
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drone_registrations');
    }
};
