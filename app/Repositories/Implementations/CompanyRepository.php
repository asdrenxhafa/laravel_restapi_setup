<?php
namespace App\Repositories\Implementations;

use App\Models\Company;
use App\Repositories\Interfaces\ICompanyRepository;

class CompanyRepository implements ICompanyRepository
{
    public function __construct()
    {

    }

    public function get()
    {
        return Company::select('*');
    }

    public function getById($id)
    {
        return Company::findOrFail($id);
    }

    public function getPaginated($limit)
    {
        return Company::paginate($limit);
    }

    public function insert(Company $company,$quietly=true)
    {
        $dispatcher = $company->getEventDispatcher();
        if($quietly) {
            $company->unsetEventDispatcher();
            $company->save();
            $company->setEventDispatcher($dispatcher);
            return $company;
        }
        $company->save();
        return $company;
    }

    public function update(Company $company)
    {
        return $company->update();
    }

    public function delete($id)
    {
        return $this->getById($id)->delete();
    }
}
