<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guarantee_code', 45);
            $table->string('name_lastname_guarantee', 45);
            $table->string('guarantee_phone', 45);
            $table->string('ocupation', 45);
            $table->string('observation', 45)->nullable();
            $table->integer('reference_id')->unsigned();
            $table->foreign('reference_id')->references('id')->on('references');
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
        Schema::dropIfExists('guarantors');
    }
}
