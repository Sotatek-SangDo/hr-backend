<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('job_id');
            $table->date('started_at');
            $table->date('ended_at');
            $table->integer('num');
            $table->longText('recruitment_required');
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
        Schema::dropIfExists('recruitment_plan');
    }
}
