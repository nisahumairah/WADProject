<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'workout_type',
        'duration',
        'calories_burned',
        'sets',
        'reps',
        'workout_date',
    ];
}
