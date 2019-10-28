<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvhConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ovh_configs', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->boolean('active')->default(true);
            $table->string('app_endpoint')->default('ovh-eu');
            $table->string('app_key');
            $table->string('app_secret');
            $table->string('app_conskey');
            $table->string('nichandle')->nullable();
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
        Schema::dropIfExists('ovh_configs');
    }
}
