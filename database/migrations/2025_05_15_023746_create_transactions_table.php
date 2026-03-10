<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->unsignedInteger('checkout_id');
            $table->string('transaction_code')->unique();
            $table->enum('payment_status', ['success', 'failed', 'pending'])->default('pending');
            $table->dateTime('payment_date');
            $table->string('payment_method');
            $table->decimal('amount_paid', 10, 2);
            $table->timestamps();
            
            $table->foreign('checkout_id')->references('checkout_id')->on('checkouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
