<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    static $rules = [
        'name',
        'email',
        'password',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    function isTrusted()
    {
        return $this->trusted ? true : false;
    }

    function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_link_users')->withTimestamps();
    }

    function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }


    public function votedFor(CommunityLink $link)
    {
        return $this->votes->contains($link);
    }
}
