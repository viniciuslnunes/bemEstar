<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ATENDIMENTO
        Schema::create('quest_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quest_id');
            $table->foreign('quest_id')->references('id')->on('quest_forms')->onDelete('cascade');
            $table->unsignedBigInteger('assessment_id');
            $table->foreign('assessment_id')->references('id')->on('assessments')->onDelete('cascade');
            $table->integer('nota');
            $table->longText('answer', 250);
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
        Schema::dropIfExists('quest_answers');
    }
}
