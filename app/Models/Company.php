<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Company extends Model
{
    use softDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['EmployeesResource'];

    protected $dates = ['deleted_at'];

    public function employees(){
        return $this->hasMany(Employee::class,'company');
    }

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];
}
