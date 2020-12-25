<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Nome do jovem ou da empresa');
            $table->string('email')->unique()->comment('E-mail do jovem ou da empresa');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('Senha do jovem ou da empresa');
            $table->enum('level', ['young', 'company', 'admin'])->default('young')->comment('Nível do usuário');
            $table->string('branch')->nullable()->comment('Ramo que a empresa trabalha');
            $table->string('cnpj')->nullable()->comment('CNPJ da empresa');
            $table->string('description')->nullable()->comment('Descrição do usuário');
            $table->string('avatar')->nullable()->comment('Foto do usuário');
            $table->string('cover')->nullable()->comment('Capa de apresentação do usuário');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
