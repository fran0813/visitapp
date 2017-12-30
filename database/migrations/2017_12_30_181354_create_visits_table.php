<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('contact_owner', array('si', 'no'));
            $table->enum('no_Contact_owner', array('si', 'no'))->nullable();
            $table->string('name_lastname_visit', 45);
            $table->string('relationship', 45);
            $table->string('economic_activity', 45);
            $table->string('reason_not_payment', 45);
            $table->string('observations_not_payment', 45)->nullable();
            $table->integer('guarantor_id')->unsigned();
            $table->foreign('guarantor_id')->references('id')->on('guarantors');
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
        Schema::dropIfExists('visits');
    }
}
