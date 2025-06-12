<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('motivations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Author
        $table->string('quote');
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->string('category');
        $table->string('tags')->nullable(); // ✅ New field
        $table->string('source')->nullable(); // ✅ New field
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motivations');
    }
};
