<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class EmployeesResource extends JsonResource
{



    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'company' => $this->companyRelationship,
            'company_id' => $this->company,
            'email' => $this->email,
            'phone' => $this->phone,
            'links' => [
                'rel' => route('employees.show', $this->id),
                'href' => route('companies.show', $this->company),
            ],

        ];
    }
}
