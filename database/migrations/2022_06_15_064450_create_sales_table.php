<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_number');
            $table->date('date_emission');
            $table->time('time_emission');
            $table->integer('payment_method_id');
            $table->decimal('total_base_price');
            $table->decimal('total_tax_price');
            $table->decimal('total_price');
            $table->integer('customer_id');
            $table->integer('active');
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
        Schema::dropIfExists('sales');
    }
};
