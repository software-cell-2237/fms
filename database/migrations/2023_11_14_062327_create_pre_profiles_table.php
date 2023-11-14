<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_profiles', function (Blueprint $table) {
            $table->id('pre_profile_id');
            $table->integer('pre_user_id');
            $table->string('father_name');
            $table->string('religion');
            $table->string('mobile_no');
            $table->string('current_address');
            $table->string('parmanent_address');
            $table->string('mailing_address');
            $table->string('dob');
            $table->integer('mailing_city');
            $table->string('gender');
            $table->string('phone_res');
            $table->string('permanent_city_id');
            $table->string('added_date');
            $table->string('added_by');
            $table->string('server_ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_profiles');
    }
}
