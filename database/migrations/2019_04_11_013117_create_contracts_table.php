<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->string('contract_code', 10);
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('contract_type_id');
            $table->integer('salary_basic');
            $table->integer('salary_insurrance');
            $table->enum('status', ['Hết hiệu lực', 'Đang có hiệu lưc'])->default('Đang có hiệu lưc');
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
        Schema::dropIfExists('contracts');
    }
}
