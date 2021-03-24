<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Http\Resources\EmployeesResource as EmployeesResource;
use App\Models\Employee;
use App\Repositories\Interfaces\IEmployeeRepository;

class EmployeesController extends Controller
{
    private $employeeRepository;

    public function __construct(IEmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

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

        $this->employeeRepository->insert($employee);

        return $this->showOne($employee,201);
    }


    public function update(EmployeesRequest $request, Employee $employee)
    {
        $this->employeeRepository->update($employee->fill($request->validated()));

        return $this->showOne($employee);
    }


    public function destroy(Employee $employee)
    {
        $this->employeeRepository->delete($employee);

        return $this->showOne($employee);
    }

}
