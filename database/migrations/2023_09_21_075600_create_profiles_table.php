<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('father_name');
            $table->integer('department_id');
            $table->string('designation');
            $table->integer('scale');
            $table->string('scale_type');
            $table->string('joining_date');
            $table->string('religion');
            $table->string('mobile_no');
            $table->string('current_address');
            $table->string('parmanent_address');
            $table->string('mailing_address');
            $table->string('cnic');
            $table->string('dob');
            $table->integer('city_id');
            $table->string('gender');
            $table->string('phone_res');
            $table->string('phone_office');
            $table->string('emergency_contact');
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
        Schema::dropIfExists('profiles');
    }
}
