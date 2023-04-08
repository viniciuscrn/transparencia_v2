<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero');
            $table->string('seq')->nullable();
            $table->longText('objeto');
            $table->date('datasessao');
            $table->tinyInteger('modalidade_id')->unsigned();
            $table->tinyInteger('unidadegestora_id')->unsigned();
            $table->tinyInteger('situacao_id')->unsigned();
            $table->foreign('modalidade_id')->references('id')->on('modalidades');
            $table->foreign('unidadegestora_id')->references('id')->on('unidade_gestoras');
            $table->foreign('situacao_id')->references('id')->on('situacoes');
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
        Schema::dropIfExists('licitacoes');
    }
};
