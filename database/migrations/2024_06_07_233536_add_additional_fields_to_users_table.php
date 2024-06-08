<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('site_users', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable()->change();
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('postal_code')->nullable();
            $table->boolean('accept_announcement')->default(false);
        });
    }

    public function down()
    {
        Schema::table('site_users', function (Blueprint $table) {
            $table->dropColumn(['firstname', 'lastname', 'address', 'province', 'district', 'sub_district', 'postal_code', 'accept_announcement']);
            $table->string('email')->nullable(false)->change();
        });
    }
};
