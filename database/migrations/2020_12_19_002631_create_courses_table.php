<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->comment('Id da empresa, que é o usuário')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name')->comment('Nome do curso');
            $table->text('description')->nullable()->comment('Descrição do curso');
            $table->timestamps();
            $table->enum('difficult', ['beginner', 'intermediate', 'advanced'])->default('beginner')->comment('Dificuldade do curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
