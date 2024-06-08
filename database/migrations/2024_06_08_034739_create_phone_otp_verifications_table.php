<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneOtpVerificationsTable extends Migration
{
    public function up()
    {
        Schema::create('phone_otp_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('otp');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('expires_at')->nullable(); // Make it nullable
            // Alternatively, set a default value:
            // $table->timestamp('expires_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('phone_otp_verifications');
    }
};
