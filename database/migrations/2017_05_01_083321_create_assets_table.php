<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id')->index();;
            $table->string('name',50);
            $table->integer('category')->index();
            $table->date('date')->nullable();
            $table->integer('cost')->nullable();
            $table->string('status',20);
            $table->integer('keeper')->index();
            $table->boolean('lendable');
            $table->string('location',50);
            $table->text('remark')->nullable();
            $table->string('vendor',40);
            $table->integer('warranty')->index();
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
        Schema::drop('assets');
    }
}
