<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Http\Resources\EmployeesResource as EmployeesResource;
use App\Models\Employee;

class EmployeesController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny',Employee::class);

        $collection = $this->sortData(Employee::select('*'));

        return $collection->paginate(request()->has('per_page') ? request()->per_page : 10);
    }


    public function show(Employee $employee)
    {
        $this->authorize('view',$employee);

        return new EmployeesResource($employee);
    }


    public function store(EmployeesRequest $request)
    {
        $employee = new Employee($request->validated());

        $employee->save();

        return $this->showOne($employee,201);
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
