<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->string('cnpj');
            $table->string('nome');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('tel')->nullable();
            $table->string('cel')->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('logo');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER trig_instituicoes_insert
        BEFORE INSERT ON instituicoes
        FOR EACH ROW
        BEGIN
            IF ((SELECT COUNT(*) FROM instituicoes) >= 1) THEN
                SIGNAL SQLSTATE \'45000\' SET MESSAGE_TEXT = \'Não é possível inserir mais de um registro na tabela minha_tabela.\';
            END IF;
        END
    ');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trig_instituicoes_insert');
        Schema::dropIfExists('instituicoes');
    }
};
