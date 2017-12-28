<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('names_lastnames', 45);
            $table->string('identification_document', 45);
            $table->string('email', 45)->unique();
            $table->string('cell_phone', 45);
            $table->string('residence_address', 45);
            $table->string('residence_phone', 45);
            $table->string('business_address', 45);
            $table->string('office_phone', 45);
            $table->string('most_contact_address', 45);
            $table->string('address_of_visit', 45);
            $table->integer('general_id')->unsigned();
            $table->foreign('general_id')->references('id')->on('generals');
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
        Schema::dropIfExists('clients');
    }
}
