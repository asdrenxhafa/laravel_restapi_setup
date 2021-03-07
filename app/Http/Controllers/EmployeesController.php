<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Http\Resources\EmployeesResource as EmployeesResource;
use App\Models\Employee;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class EmployeesController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny',Employee::class);

        $collection = $this->sortData(Employee::select('*'));
        return $collection->paginate(request()->has('per_page') ? request()->per_page : 10);
    }


    public function show($id)
    {
        $this->authorize('viewAny',Employee::class);

        return new EmployeesResource(Employee::findOrFail($id));
    }


    public function store(EmployeesRequest $request)
    {

        $newEmployee = new Employee($request->validated());

        Mail::to($newEmployee->email)->send(new TestMail());

        return $this->showOne($newEmployee,201);
    }


    public function update(EmployeesRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return $this->showOne($employee);
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return $this->showOne($employee);
    }

}
