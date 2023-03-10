<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('lkp_seksyen_id');
            $table->integer('lkp_unit_id');
            $table->integer('lkp_bahagian_id');
            $table->integer('lkp_gred_id');
            $table->integer('lkp_jawatan_id');
            $table->string('nama');
            $table->integer('no_ic');
            $table->string('emel');
            $table->integer('no_tel');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
