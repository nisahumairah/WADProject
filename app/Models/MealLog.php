<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meal_type',
        'food_items',
        'portion_size',
        'calories',
        'protein',
        'carbs',
        'fats',
        'is_halal',
    ];

    protected $casts = [
        'food_items' => 'array',
        'is_halal' => 'boolean',
    ];
}
