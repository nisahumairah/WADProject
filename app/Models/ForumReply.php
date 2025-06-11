<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ForumReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'forum_topic_id',
        'content',
        'is_helpful'
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with ForumTopic
    public function topic(): BelongsTo
    {
        return $this->belongsTo(ForumTopic::class, 'forum_topic_id');
    }

    // Polymorphic relationship with Likes
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // Helper method to check if user liked the reply
    public function isLikedBy($user)
    {
    return $this->likes()->where('user_id', $user->id)->exists();
    }

    // Mark as helpful
    public function markAsHelpful()
    {
        $this->update(['is_helpful' => true]);
    }
}
