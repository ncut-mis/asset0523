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
            $table->integer('asset_id')->index();
            $table->integer('vendor_id')->index();
            $table->date('date')->nullable();
            $table->string('status',20)->nullable();
            $table->string('method',20)->nullable();
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
