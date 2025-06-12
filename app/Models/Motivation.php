<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    protected $fillable = [
        'quote',
        'description',
        'category',
        'tags',
        'source',
        'image',
        'user_id', // ✅ Allow mass assignment
    ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function bookmarkedByUsers()
    {
    return $this->belongsToMany(\App\Models\User::class, 'bookmarks')->withTimestamps();
    }

    public function likedByUsers()
    {
    return $this->belongsToMany(\App\Models\User::class, 'motivation_likes')->withTimestamps();
    }


}
