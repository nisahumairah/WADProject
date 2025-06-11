<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type'
    ];

    // Polymorphic relationship
    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
