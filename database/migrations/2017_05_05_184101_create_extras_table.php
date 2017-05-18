<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->integer('movies_id');
            $table->string('certification');
            $table->string('plot');
            $table->string('year');
            $table->string('aspect_ratio');
            $table->string('awards');
            $table->string('castlink');
            $table->string('companylink');
            $table->string('directorlink');
            $table->string('lang');
            $table->string('location');
            $table->string('soundmix');
            $table->string('tagline');
            $table->string('trailer');
            $table->string('userreview');
            $table->string('writer');
            $table->string('votes');
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
    }
}
