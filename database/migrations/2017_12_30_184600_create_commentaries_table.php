<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commentary', 45);
            $table->enum('visit_effect', array('noViveTrabaja', 'promesaNegociacion', 'voluntadPago', 'noAtendioVisita', 'remitidoSucursal', 'renuente', 'cancelo'));
            $table->enum('inaccessible_place', array('inseguridad', 'olaInvernal', 'otro'));
            $table->string('another_reason', 45);
            $table->enum('non_existent_address', array('noEncontrada', 'incompleta'));
            $table->enum('Subrogation', array('fallecido', 'posibleNegociacion'));
            $table->enum('type_of_contact', array('deudor', 'conyuge', 'codeudor', 'tercero'));
            $table->integer('agreement_id')->unsigned();
            $table->foreign('agreement_id')->references('id')->on('agreements');
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
        Schema::dropIfExists('commentaries');
    }
}
