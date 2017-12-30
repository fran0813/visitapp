<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('payment_agreement', array('si', 'no'));
            $table->string('product', 45)->nullable();
            $table->string('commitment_date', 45)->nullable();
            $table->string('promise_value', 45)->nullable();
            $table->string('alternative', 200)->nullable();
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits');
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
        Schema::dropIfExists('agreements');
    }
}
