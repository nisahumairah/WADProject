<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class WorkoutComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workout_post_id',
        'content'
    ];

    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with WorkoutPost
    public function workoutPost(): BelongsTo
    {
        return $this->belongsTo(WorkoutPost::class);
    }

    // Polymorphic relationship with Likes
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
