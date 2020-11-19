<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj')->unique()->max(14);
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('telefone');
            $table->string('email');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('segmento');
            $table->string('inscricao_municipal');
            $table->string('inscricao_estadual');
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
