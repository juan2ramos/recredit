<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateValidationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('validations', function (Blueprint $table) {

            $table->renameColumn('document', 'documentValidation')->default(0);
            $table->text('other')->text()->change();
            $table->boolean('fingerprint')->default(0)->change();
            
            $table->text('observation')->nullable()->change();
            $table->boolean('authorization')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('validations', function (Blueprint $table) {
            //
        });
    }
}
