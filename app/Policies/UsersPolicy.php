<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UsersPolicy
{
    public function dashBoard(User $user){
        return $user->admin;
    }
    /**
     * Determine whether the user can view any models.
     */
}