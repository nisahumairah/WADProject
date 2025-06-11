<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Motivation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote',
        'source',
        'reflection',
        'image_url',
        'difficulty_level',
        'category_tag',
        'author_id',
    ];

    /**
     * Get the author (user) who created the motivation.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function likes() {
    return $this->hasMany(Like::class);
}

}
