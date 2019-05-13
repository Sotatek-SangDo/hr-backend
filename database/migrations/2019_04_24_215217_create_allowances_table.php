<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->string('allowance_type');
            $table->integer('subsidy');
            $table->date('apply_date');
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('salary_allowances');
    }
}
