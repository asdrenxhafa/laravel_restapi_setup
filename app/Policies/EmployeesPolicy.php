<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user){
        if($user->admin == true)
        {
            return true;
        }

    }

    public function view(User $user){
        if($user->admin == true)
        {
            return true;
        }

    }

}
