<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeesPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user){

        return $user->admin;

    }

    public function view(User $user, Employee $employee){

        return $user->admin;

    }

}
