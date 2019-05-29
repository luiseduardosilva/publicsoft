<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valor_campos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('valor');
            $table->unsignedBigInteger('etapa_id');
            $table->foreign('etapa_id')->references('id')->on('etapas')->onDelete('cascade');
            $table->unsignedBigInteger('campo_id');
            $table->foreign('campo_id')->references('id')->on('campos')->onDelete('cascade');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('valor_campos');
    }
}
