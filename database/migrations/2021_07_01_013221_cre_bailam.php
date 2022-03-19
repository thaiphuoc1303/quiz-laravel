<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreBailam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bailam', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('de')->unsigned();
            $table->foreign('de')->references('id')->on('bailam');
            $table->integer('id_hs')->unsigned();
            $table->foreign('id_hs')->references('id')->on('hocsinh');
            $table->dateTime('thoigianlam');
            $table->dateTime('lastcheck');
            $table->dateTime('thoigiannop')->nullable();
            $table->string('dapan', 2000);
            $table->integer('luotlam')->default(0);
            $table->integer('diem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bailam');
        //
    }
}
