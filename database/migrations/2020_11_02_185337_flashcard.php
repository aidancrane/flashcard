<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Flashcard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flashcard', function ($table) {
            $table->id();
            $table->unsignedBigInteger('set_id');
            $table->string('front_text', 300);
            $table->string('back_text', 300);
            $table->foreign('set_id')->references('id')->on('set')->onDelete('cascade');
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
        Schema::dropIfExists('flashcard');
    }
}
