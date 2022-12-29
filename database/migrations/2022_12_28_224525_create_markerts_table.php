<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markerts', function (Blueprint $table) {
            $table->id();
            $table->double('lat');
            $table->double('lng');
            $table->unsignedBigInteger('polygon_id')->nullable();
            $table->foreign('polygon_id')->references('id')->on('polygons');
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
        Schema::dropIfExists('markerts');
    }
};