<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // New relationship for forum
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get all workout posts created by the user
     */
    public function workoutPosts(): HasMany
    {
        return $this->hasMany(WorkoutPost::class);
    }

    /**
     * Get all workout comments created by the user
     */
    public function workoutComments(): HasMany
    {
        return $this->hasMany(WorkoutComment::class);
    }

    /**
     * Get all forum topics created by the user
     */
    public function forumTopics(): HasMany
    {
        return $this->hasMany(ForumTopic::class);
    }

    /**
     * Get all forum replies created by the user
     */
    public function forumReplies(): HasMany
    {
        return $this->hasMany(ForumReply::class);
    }

    /**
     * Get all likes given by the user
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Calculate total likes received across all content types
     */
    public function totalLikesReceived(): int
    {
        $workoutPostLikes = WorkoutPost::where('user_id', $this->id)
            ->withCount('likes')
            ->get()
            ->sum('likes_count');

        $forumTopicLikes = ForumTopic::where('user_id', $this->id)
            ->withCount('likes')
            ->get()
            ->sum('likes_count');

        $forumReplyLikes = ForumReply::where('user_id', $this->id)
            ->withCount('likes')
            ->get()
            ->sum('likes_count');

        return $workoutPostLikes + $forumTopicLikes + $forumReplyLikes;
    }
}
