<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreChuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('chuong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('khoi')->unsigned();
            $table->foreign('khoi')->references('id')->on('khoi');
            $table->integer('dai_hinh');
            $table->integer('ki');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('chuong');
    }
}
