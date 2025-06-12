<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\ForumTopic;
use App\Models\Motivation;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Motivation> $bookmarkedMotivations
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Motivation> $likedMotivations
 */

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

    public function motivations()
    {
    return $this->hasMany(Motivation::class);
    }

    public function bookmarkedMotivations()
    {
        return $this->belongsToMany(Motivation::class, 'bookmarks');
    }

    public function likedMotivations()
    {
        return $this->belongsToMany(Motivation::class, 'motivation_likes');
    }

}
