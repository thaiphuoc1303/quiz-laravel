<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreBaitap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baitap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('theloai')->unsigned();
            $table->foreign('theloai')->references('id')->on('theloai');
            $table->integer('hinh_dai');
            $table->integer('dokho');
            $table->string('de', 20000);
            $table->string('DaA', 20000);
            $table->string('DaB', 20000);
            $table->string('DaC', 20000);
            $table->string('DaD', 20000);
            $table->integer('Da');
            $table->string('chon')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baitap');
    }
}
