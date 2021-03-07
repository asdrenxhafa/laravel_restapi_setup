<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompaniesPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user){

        return $user->admin;

    }

    public function view(User $user, Company $company){

        return $user->admin;

    }

}
