<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRegisterModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_register_modules', function (Blueprint $table) {
            $table->id('urm_id');
            $table->integer('user_id');
            $table->integer('module_id');
            $table->integer('role_id');
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
        Schema::dropIfExists('user_register_modules');
    }
}
