<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments_create', function (Blueprint $table) {

            $table->id();
            
            $table->unsignedBigInteger('quest_id');
            $table->foreign('quest_id')->references('id')->on('quest_forms')->onDelete('cascade');

            $table->integer('nota', 10);
            $table->string('answer', 250);
            $table->string('image', 150);
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
        Schema::dropIfExists('assessments_create');
    }
}
