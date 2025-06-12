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
    Schema::create('meal_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // links to users table
        $table->string('meal_type'); // e.g., Breakfast, Lunch
        $table->json('food_items'); // stores list like ["Chicken", "Rice"]
        $table->string('portion_size')->nullable(); // e.g., 200g, 1 bowl
        $table->integer('calories')->nullable();
        $table->integer('protein')->nullable();
        $table->integer('carbs')->nullable();
        $table->integer('fats')->nullable();
        $table->boolean('is_halal')->default(true); // checkbox
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_logs');
    }
};
