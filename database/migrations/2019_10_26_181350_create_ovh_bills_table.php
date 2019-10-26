<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvhBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ovh_bills', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('billId');
            $table->string('nic');
            $table->datetime('documentDate');
            $table->string('url')->nullable();
            $table->string('password')->nullable();
            $table->string('currency');
            $table->decimal('priceWithoutTax', 12, 4);
            $table->decimal('tax', 12, 4);
            $table->decimal('priceWithTax', 12, 4);
            $table->string('orderId')->nullable();
            $table->decimal('outConsumption',12, 4)->default(0);
            $table->boolean('outConsumptionSet')->default(false);
            $table->decimal('deposit', 12, 4)->default(0);
            $table->boolean('depositSet')->default(false);
            $table->boolean('done')->default(false);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('ovh_bills');
    }
}
