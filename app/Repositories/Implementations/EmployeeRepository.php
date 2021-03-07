<?php
namespace App\Repositories\Implementations;

use App\Models\Employee;
use App\Repositories\Interfaces\IEmployeeRepository;

class EmployeeRepository implements IEmployeeRepository
{
    public function __construct()
    {

    }

    public function get()
    {
        return Employee::select('*');
    }

    public function getById($id)
    {
        return Employee::findOrFail($id);
    }

    public function getPaginated($limit)
    {
        return Employee::paginate($limit);
    }

    public function insert(Employee $employee,$quietly=true)
    {
        $dispatcher = $employee->getEventDispatcher();
        if($quietly) {
            $employee->unsetEventDispatcher();
            $employee->save();
            $employee->setEventDispatcher($dispatcher);
            return $employee;
        }
        $employee->save();
        return $employee;
    }

    public function update(Employee $employee)
    {
        return $employee->update();
    }

    public function delete($id)
    {
        return $this->getById($id)->delete();
    }
}
