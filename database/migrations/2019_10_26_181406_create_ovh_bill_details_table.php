<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvhBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ovh_bill_details', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('bill_id');
            $table->string('billId');
            $table->string('billDetailId');
            $table->string('description');
            $table->string('domain');
            $table->date('periodStart')->nullable();
            $table->date('periodEnd')->nullable();
            $table->integer('quantity');
            $table->string('currency');
            $table->decimal('unitPrice', 12, 4);
            $table->decimal('totalPrice', 12, 4);
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
        Schema::dropIfExists('ovh_bill_details');
    }
}
