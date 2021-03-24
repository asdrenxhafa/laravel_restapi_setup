<?php

namespace App\Observers;

use App\Models\Employee;
use App\Notifications\EmployeeWelcomeNotification;
use Illuminate\Support\Facades\Notification;

class EmployeeObserver
{

    public function created(Employee $employee)
    {
        Notification::route('mail', $employee->email)
            ->notify(new EmployeeWelcomeNotification($employee));
    }


    public function updated(Employee $employee)
    {
        //
    }


    public function deleted(Employee $employee)
    {
        //
    }


    public function restored(Employee $employee)
    {
        //
    }


    public function forceDeleted(Employee $employee)
    {
        //
    }
}
