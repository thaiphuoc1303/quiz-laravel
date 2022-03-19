<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreDebai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('khoi')->unsigned();
            $table->foreign('khoi')->references('id')->on('khoi');
            $table->string('ten');
            $table->integer('dokho')->nullable();
            $table->integer('thoigian')->nullable();
            $table->integer('luotlam')->default(0);
            $table->string('de', 2000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debai');
    }
}
