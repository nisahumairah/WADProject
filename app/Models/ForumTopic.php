<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\User;

class ForumTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'views',
        'is_pinned',
        'is_locked'
    ];

    // Relationship with User
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    // Relationship with Replies
    public function replies()
    {
        return $this->hasMany(ForumReply::class);
    }

    // Polymorphic relationship with Likes
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // Get most recent reply
    public function lastReply()
    {
        return $this->replies()->latest()->first();
    }

    // Increment view count
    public function incrementViews()
    {
        $this->increment('views');
    }

}
