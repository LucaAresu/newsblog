<?php

namespace App\Policies;

use App\Section;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;


    public function before(User $user)
    {
        if($user->isAdmin )
            return true;
    }
}
