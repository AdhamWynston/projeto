<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('status')->default('1');
            $table->smallInteger('type')->default('1');
            $table->string('document');
            $table->string('state');
            $table->string('city');
            $table->string('zip_code');
            $table->string('street');
            $table->string('neighborhood');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('phone');
            $table->string('phoneAlternative')->nullable();
            $table->string('email');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
