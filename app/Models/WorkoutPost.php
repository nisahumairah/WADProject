<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class WorkoutPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'difficulty',
        'targeted_muscles',
        'media_path'
    ];

    protected $casts = [
        'targeted_muscles' => 'array',
    ];

    // Relationship with User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Comments
    public function comments(): HasMany
    {
        return $this->hasMany(WorkoutComment::class);
    }

    // Polymorphic relationship with Likes
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // Helper method to check if user liked the post
    public function isLikedBy(User $user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    // Helper method to get targeted muscles as array
    public function getTargetedMusclesArrayAttribute(): array
    {
        return explode(',', $this->targeted_muscles);
    }
}
