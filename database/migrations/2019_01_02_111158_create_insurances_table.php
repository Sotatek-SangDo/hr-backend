<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('emp_id');
            $table->string('num_social_security')->nullable();
            $table->string('num_health_insurance')->nullable();
            $table->string('place_registration_medical')->nullable();
            $table->string('salary_paid');
            $table->date('started_at')->nullable();
            $table->enum('status', ['Đang tham gia', 'Giảm tạm thời', 'Giảm hẳn']);
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
        Schema::dropIfExists('insurances');
    }
}
