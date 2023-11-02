<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrailBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trail_balances', function (Blueprint $table) {
            $table->id();
            $table->integer('account_code');
            $table->string('account_title');
            $table->integer('opening_debit');
            $table->integer('opening_credit');
            $table->string('activity_debit');
            $table->string('activity_credit');
            $table->string('closing_debit');
            $table->string('closing_credit');
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
        Schema::dropIfExists('trail_balances');
    }
}
