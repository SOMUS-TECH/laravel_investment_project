<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('email_g');
            $table->string('email_r');
            $table->string('reff_g');
            $table->string('reff_r');
            $table->string('amount_g');
            $table->string('amount_r');
            $table->string('balance_g');
            $table->string('balance_r');
            $table->string('date');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('pot');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('matches');
    }
}
