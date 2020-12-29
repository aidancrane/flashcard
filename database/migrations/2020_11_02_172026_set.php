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
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('set_title', 100);
            $table->string('set_description', 200)->default("");
            $table->string('category', 100)->default("");
            $table->boolean('is_favourite')->default(false);
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
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
