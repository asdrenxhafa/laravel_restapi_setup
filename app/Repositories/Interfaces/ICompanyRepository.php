<?php
namespace App\Repositories\Interfaces;


use App\Models\Company;

interface ICompanyRepository
{
    public function __construct();

    public function get();

    public function getById($id);

    public function getPaginated($limit);

    public function insert(Company $company,$quietly=true);

    public function update(Company $company);

    public function delete($id);
}
