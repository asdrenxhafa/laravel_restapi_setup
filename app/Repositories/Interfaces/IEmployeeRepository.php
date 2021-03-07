<?php
namespace App\Repositories\Interfaces;

use App\Models\Employee;

interface IEmployeeRepository
{
    public function __construct();

    public function get();

    public function getById($id);

    public function getPaginated($limit);

    public function insert(Employee $employee,$quietly=true);

    public function update(Employee $employee);

    public function delete($id);
}
