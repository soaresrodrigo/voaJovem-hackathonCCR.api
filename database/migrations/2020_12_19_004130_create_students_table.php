<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->comment('Id do curso')->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->comment('Id do estudante, que é o usuário')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('grade')->comment('Nota do aluno')->nullable();
            $table->string('certified')->comment('Certificado do aluno')->nullable();
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
        Schema::dropIfExists('students');
    }
}
