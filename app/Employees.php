<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Employees extends Model
{
    use softDeletes;

    protected $dates = ['deleted_at'];

    public $table = "employees";

    public function companyRelationship(){
        return $this->belongsTo(Companies::class,'company');
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone',
    ];


}
