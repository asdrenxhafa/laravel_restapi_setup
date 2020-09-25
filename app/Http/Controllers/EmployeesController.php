<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Http\Resources\Employees as EmployeesResource;
use App\Employees;
use App\Mail\TestMail;
use DB;
use Illuminate\Support\Facades\Mail;

class EmployeesController extends ApiController
{

    public function index()
    {
        $this->authorize('viewAny',Employees::class);

        $collection = $this->sortData(Employees::select('*'));
        return $collection->paginate(request()->has('per_page') ? request()->per_page : 10);
    }


    public function show($id)
    {
        $this->authorize('viewAny',Employees::class);

        return new EmployeesResource(Employees::findOrFail($id));
    }


    public function store(EmployeesRequest $request)
    {

        $newEmployee = new Employees($request->validated());

        Mail::to($newEmployee->email)->send(new TestMail());

        return $this->showOne($newEmployee,201);
    }


    public function update(EmployeesRequest $request,Employees $employee)
    {
        $employee->update($request->validated());

        return $this->showOne($employee);
    }


    public function destroy(Employees $employee)
    {
        $employee->delete();

        return $this->showOne($employee);
    }

}
