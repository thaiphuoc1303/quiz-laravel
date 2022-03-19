<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreHocsinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocsinh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('namsinh')->nullable();
            $table->string('truong')->nullable();
            $table->string('email')->unique();
            $table->string('sodienthoai');
            $table->integer('lop')->unsigned();
            $table->foreign('lop')->references('id')->on('lop');
            $table->integer('hocluc')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('hocsinh');
    }
}
