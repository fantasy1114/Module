<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatransSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatrans_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('end_day');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('payment_enable');
            $table->string('own_id')->unique();
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
        Schema::dropIfExists('datatrans_settings');
    }
}
