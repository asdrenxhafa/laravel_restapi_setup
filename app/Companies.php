<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Companies extends Model
{
    use softDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['Employees'];

    protected $dates = ['deleted_at'];

    public function employees(){
        return $this->hasMany(Employees::class,'company');
    }

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];
}
