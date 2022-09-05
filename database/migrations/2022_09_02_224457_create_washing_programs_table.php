<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWashingProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('washing_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::create('washing_program_washing_step', function (Blueprint $table) {
            $table->foreignId('washing_program_id');
            $table->foreign('washing_program_id')->references('id')->on('washing_programs')->onDelete('cascade');
            $table->foreignId('washing_step_id');
            $table->foreign('washing_step_id')->references('id')->on('washing_steps')->onDelete('cascade');
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
        Schema::dropIfExists('washing_programs');
        Schema::dropIfExists('washing_program_washing_step');
    }
}
