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
        Schema::table('motivations', function (Blueprint $table) {
            $table->text('reflection')->nullable();
            $table->string('image_url')->nullable();
            $table->string('difficulty_level')->nullable();
            $table->string('category_tag')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();

            // Add foreign key constraint (optional, but recommended)
            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motivations', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['author_id']);

            // Then drop the columns
            $table->dropColumn([
                'reflection',
                'image_url',
                'difficulty_level',
                'category_tag',
                'author_id',
            ]);
        });
    }
};
