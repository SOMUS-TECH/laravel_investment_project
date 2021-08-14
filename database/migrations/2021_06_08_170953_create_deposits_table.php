<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('deposits', function (Blueprint $table) {
            $table->string('end_date');
        });
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('amount_deposit');
            $table->string('amount_to_recieve');
            $table->string('balance');
            $table->string('date');
            $table->string('reff');
            $table->string('start_date')->default('0');
            $table->string('end_date')->default('0');
            $table->string('matched')->default('0');
            $table->string('status')->default('0');
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
        Schema::dropIfExists('deposits');
    }
}
