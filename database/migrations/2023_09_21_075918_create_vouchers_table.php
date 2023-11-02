<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('financial_year');
            $table->integer('voucher_id');
            $table->integer('voucher_no');
            $table->string('account_name');
            $table->integer('account_code');
            $table->integer('department_id');
            $table->integer('cheque');
            $table->integer('amount');
            $table->string('description');
            $table->string('voucher_date');
            $table->string('budget_date');
            $table->string('amount_type');
            $table->integer('company_id');
            $table->string('budget_amount');
            $table->string('balance_amount');
            $table->integer('project_id');
            $table->string('start_date');
            $table->string('start_time');
            $table->string('voucher_month');
            $table->string('voucher_year');
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
        Schema::dropIfExists('vouchers');
    }
}
