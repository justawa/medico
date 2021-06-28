<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttemptDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attempt_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attempt_id')->constrained('attempts');
            $table->foreignId('question_id')->constrained('questions');
            $table->foreignId('option_id')->constrained('options');
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
        Schema::dropIfExists('attempt_details');
    }
}
