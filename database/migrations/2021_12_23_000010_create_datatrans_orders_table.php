<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatransOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatrans_orders', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('category_name');
            $table->string('timezone_name');
            $table->string('datatrans_day');
            $table->string('datatrans_time');
            $table->string('client_name');
            $table->string('phone_num');
            $table->string('client_email');
            $table->string('client_comment')->nullable();
            $table->string('datatrans_payment');
            $table->string('status')->nullable()->default('archived');
            $table->string('own_id');
            
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
        Schema::dropIfExists('datatrans_orders');
    }
}
