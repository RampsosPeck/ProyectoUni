<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformesViehisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informesvehi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mantenimiento');

            $table->integer('informesviaje_id')->unsigned();
            $table->foreign('informesviaje_id')
                ->references('id')->on('informesviajes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
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
        Schema::drop('informesvehi');
    }
}