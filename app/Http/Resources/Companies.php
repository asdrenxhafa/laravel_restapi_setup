<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Companies extends JsonResource
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
            'identifier' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'logo' => $this->logo,
            'website' => $this->website,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
//            'deleted_at' => $this->deleted_at,
            'links' => [
                'self' => route('companies.show', $this->id),
            ],
        ];
    }


}
