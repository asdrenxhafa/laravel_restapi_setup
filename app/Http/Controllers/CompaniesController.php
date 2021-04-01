<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesRequest;
use App\Http\Resources\CompaniesResource;
use App\Models\Company;
use App\Repositories\Interfaces\ICompanyRepository;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public $companyRepository;

    public function __construct(ICompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $this->authorize('viewAny',Company::class);

        $companies = $this->sortData( Company::select('*'));

        return $companies->paginate(request()->has('per_page') ? request()->per_page : 10);
    }


    public function show(Company $company)
    {
        $this->authorize('view',$company);

        return new CompaniesResource($company);
    }


    public function store(CompaniesRequest $request)
    {
        $newEmployee = new Company($request->validated());
        $newEmployee->logo = $request->logo->store('');

        $this->companyRepository->insert($newEmployee);

        return $this->showOne($newEmployee,201);
    }


    public function update(CompaniesRequest $request, Company $company)
    {
        $this->companyRepository->update($company->fill($request->validated()));

        if($request->hasFile('logo')){
            Storage::delete($company->logo);

            $company->logo = $request->logo->store('');
        }

        return $this->showOne($company);
    }


    public function destroy(Company $company)
    {
        $this->companyRepository->delete($company);

        Storage::delete($company->logo);

        return $this->showOne($company);
    }
}
