<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('status')->default('1');
            $table->string('document');
            $table->string('state');
            $table->string('city');
            $table->string('zip_code');
            $table->string('street');
            $table->string('neighborhood');
            $table->string('number');
            $table->string('complement')->nullable();;
            $table->string('phone');
            $table->string('phoneAlternative')->nullable();
            $table->string('email');
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
        Schema::dropIfExists('employees');
    }
}
