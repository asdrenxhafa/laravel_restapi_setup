<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaniesStoreValidation;
use App\Http\Resources\Companies as CompaniesResource;
use App\Companies;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;

class CompaniesController extends ApiController
{

    public function index()
    {
        $this->authorize('viewAny',Companies::class);

        $collection = $this->sortData( Companies::select('*'));

        return $collection->paginate(request()->has('per_page') ? request()->per_page : 10);
    }


    public function show($id)
    {
        $this->authorize('view',Companies::class);

        return new CompaniesResource(Companies::findOrFail($id));
    }


    public function store(CompaniesStoreValidation $request)
    {
        $newEmployee = new Companies($request->validated());

        $newEmployee->logo = $request->logo->store('');
        $newEmployee->save();
        return $this->showOne($newEmployee,201);
    }


    public function update(CompaniesStoreValidation $request,Companies $company)
    {
        $company->update($request->validated());

        if($request->hasFile('logo')){
            Storage::delete($company->logo);

            $company->logo = $request->logo->store('');
        }

        return $this->showOne($company);
    }


    public function destroy(Companies $company)
    {
        if($company->exists()){
            return ['exists'];
        }

        $company->delete();

        Storage::delete($company->logo);

        return $this->showOne($company);
    }


    public function employee($id)
    {
        $ans = Companies::find($id)->employees()->get();

        return $this->showAll($ans);
    }

}
