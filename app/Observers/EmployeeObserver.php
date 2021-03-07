<?php

namespace App\Observers;

use App\Mail\TestMail;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;

class EmployeeObserver
{

    public function created(Employee $employee)
    {
        Mail::to($employee->email)->send(new TestMail());
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
