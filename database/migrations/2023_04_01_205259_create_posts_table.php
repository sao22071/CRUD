<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable()->default('Text');
            $table ->biginteger('category_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->enum('state',['post','no post'])->default('no post');
            $table->timestamps();

            //Agregando clave foranea para la conexión con la tabla categoria 
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};