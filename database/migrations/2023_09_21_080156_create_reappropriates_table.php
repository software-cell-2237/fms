<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReappropriatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reappropriates', function (Blueprint $table) {
            $table->id();
            $table->string('financial_year');
            $table->string('budget_type');
            $table->integer('department_id');
            $table->string('account_name');
            $table->integer('account_code');
            $table->integer('debit_amount');
            $table->integer('credit_amount');
            $table->string('description');
            $table->string('expence_department');
            $table->integer('project_id');
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
        Schema::dropIfExists('reappropriates');
    }
}
