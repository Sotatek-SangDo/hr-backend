<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('work_email');
            $table->string('private_email');
            $table->string('address');
            $table->unsignedInteger('country');
            $table->string('ethnicity');
            $table->unsignedInteger('nationality_id');
            $table->dateTime('joined_at');
            $table->string('phone');
            $table->enum('gender', ['Nam', 'Nữ', 'Khác']);
            $table->date('birthday');
            $table->string('marital_status');
            $table->date('confirmed_at');
            $table->unsignedInteger('supervisor_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('paygrade_id');
            $table->longText('notes')->nullable();
            $table->unsignedInteger('status');
            $table->unsignedInteger('job_id');
            $table->softDeletes();
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
        Schema::dropIfExists('employee');
    }
}
