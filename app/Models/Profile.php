<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'user_id',
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
