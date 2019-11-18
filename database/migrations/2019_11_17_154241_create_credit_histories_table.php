<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->tinyInteger('other_mail')->default(0);
            $table->enum('document_type', ['Cédula de ciudadanía','cédula de extranjería']);
            $table->string('document');

            $table->string('residency_city');
            $table->string('address');
            $table->string('mobile');
            $table->string('phone')->nullable();

            $table->string('name_reference_1');
            $table->string('phone_reference_1');
            $table->string('name_reference_2');
            $table->string('phone_reference_2');

            $table->text('files');

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
        Schema::dropIfExists('credit_histories');
    }
}
