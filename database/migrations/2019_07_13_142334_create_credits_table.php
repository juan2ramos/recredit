<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->tinyInteger('priority')->default(0);
            $table->integer('state')->default(0);
            $table->boolean('validated')->default(0);
            $table->dateTime('check_date')->nullable();
            $table->integer('number_requested')->default(1);

            $table->unsignedBigInteger('reasons_id')->nullable();

            $table->unsignedBigInteger('finished_user');
            $table->unsignedBigInteger('assigned_user')->default(0);
            $table->unsignedBigInteger('reviewed_user')->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('credits');
    }
}
