<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Employee extends Model
{
    use softDeletes;

    protected $dates = ['deleted_at'];

    public $table = "employees";

    public function companyRelationship(){
        return $this->belongsTo(Company::class,'company');
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone',
    ];


}
