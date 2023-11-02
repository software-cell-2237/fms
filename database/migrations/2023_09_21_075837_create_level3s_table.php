<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level3s', function (Blueprint $table) {
            $table->id();
            $table->string('financial_year');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('account_code');
            $table->integer('hec_code');
            $table->integer('main_code');
            $table->integer('control_code');
            $table->string('account_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level3s');
    }
}
