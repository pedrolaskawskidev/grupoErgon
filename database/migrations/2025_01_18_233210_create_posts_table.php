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
            $table->unsignedBigInteger('owner_id');
            $table->string('name', 100);
            $table->enum('type', ['movie', 'series']);
            $table->text('description')->nullable();
            $table->string('genre', 50)->nullable();
            $table->string('director', 100)->nullable();
            $table->date('release_date')->nullable();
            $table->integer('duration')->nullable();
            $table->float('rating', 3, 1)->nullable();
            $table->string('poster_image')->nullable();
            $table->boolean('is_featured')->default(false);

            // chave estrangeira
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');


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
