<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->comment('Id da postagem')->constrained('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('comment_id')->comment('Estrangeiro do comentário')->nullable()->constrained('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->text('information')->comment('Texto do comentário');
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
        Schema::dropIfExists('comments');
    }
}
