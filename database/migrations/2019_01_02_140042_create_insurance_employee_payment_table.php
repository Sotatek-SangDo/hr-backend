<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceEmployeePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_employee_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ip_id');
            $table->unsignedInteger('emp_id');
            $table->string('reason_leave');
            $table->string('num_social_security');
            $table->string('num_day_leave');
            $table->string('insurance_money');
            $table->string('amount');
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('insurance_employee_payment');
    }
}
