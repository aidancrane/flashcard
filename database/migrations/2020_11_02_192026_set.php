<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Set extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set', function ($table) {
            $table->string('id')->unique();
            $table->string('set_title', 100);
            $table->string('category', 100);
            $table->boolean('is_favourite')->default(false);
            $table->foreignId('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->date('creation_date');
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
        Schema::dropIfExists('set');
    }
}
