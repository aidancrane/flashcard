<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TestModeResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_result', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('set_id');
            $table->integer('skipped_questions')->default(0);
            $table->integer('correct_answers')->default(0);
            $table->integer('incorrect_answers')->default(0);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('test_result', function (Blueprint $table) {
            Schema::dropIfExists('test_result');
        });
    }
}
