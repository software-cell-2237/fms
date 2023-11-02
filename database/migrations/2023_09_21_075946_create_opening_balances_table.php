<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_balances', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->integer('account_code');
            $table->integer('department_id');
            $table->integer('project_id');
            $table->string('debit');
            $table->string('credit');
            $table->string('opening_date');
            $table->string('financial_year');
            $table->string('added_by');
            $table->string('added_date');
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
        Schema::dropIfExists('opening_balances');
    }
}
