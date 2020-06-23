<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->string('image')->default('no_image.png');
            $table->string('priority');
            $table->string('user_id');
            // $table->string('specialist_id');
            $table->string('comment')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('specialist_id')->references('id')->on('specialists');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
