<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintaincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintainces', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('a_id')->index();
            $table->integer('v_id')->index();
            $table->integer('mitems_id');
            $table->date('date');
            $table->string('status',20);
            $table->string('method',20);
            $table->text('remark')->nullable();
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
        Schema::drop('maintainces');
    }
}
