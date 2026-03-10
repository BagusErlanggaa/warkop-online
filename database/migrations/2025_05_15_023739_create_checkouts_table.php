<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('checkout_id');
            $table->unsignedBigInteger('user_id');
            $table->text('product_id'); // comma-separated list of product IDs
            $table->text('category_id'); // comma-separated list of category IDs
            $table->enum('payment_method', ['qris', 'cash_at_cashier']);
            $table->integer('no_meja')->nullable();
            $table->string('nama');
            $table->string('no_telpon');
            $table->string('bukti_bayar')->nullable();
            $table->enum('status', ['pending', 'paid', 'completed', 'cancelled'])->default('pending');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
