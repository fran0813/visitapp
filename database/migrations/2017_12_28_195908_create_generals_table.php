<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('relief_code', 45);
            $table->string('obligation_n', 45);
            $table->string('disbursement_date', 45);
            $table->string('capital_balance', 45);
            $table->string('total_balance', 45);
            $table->string('sapro_stage', 45);
            $table->string('inv_inic_goods', 45);
            $table->string('embargo', 45);
            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')->references('id')->on('agencies');
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
        Schema::dropIfExists('generals');
    }
}
