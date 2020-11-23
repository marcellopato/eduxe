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
            $table->string('company_name');
            $table->string('fantasy_name');
            $table->string('contact');
            $table->string('zip_code');
            $table->string('address');
            $table->string('address_number');
            $table->string('phone');
            $table->string('email');
            $table->string('complement')->nullable();
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
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