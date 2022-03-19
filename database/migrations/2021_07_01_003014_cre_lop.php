<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreLop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('khoi')->unsigned();
            $table->foreign('khoi')->references('id')->on('khoi');
            $table->integer('sohocsinh')->default(0);
            $table->string('lichhoc')->nullable();
            $table->integer('sobuoidahoc')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lop');
    }
}
