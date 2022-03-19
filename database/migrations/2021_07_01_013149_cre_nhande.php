<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreNhande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhande', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lop')->unsigned();
            $table->foreign('lop')->references('id')->on('lop');
            $table->integer('debai')->unsigned();
            $table->foreign('debai')->references('id')->on('debai');
            $table->integer('luotlam')->default(0);
            $table->dateTime('ngaygiao');
            $table->dateTime('hannop');
            $table->dateTime('giaodapan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhande');
        //
    }
}
