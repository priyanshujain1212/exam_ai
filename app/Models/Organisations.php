<?php

namespace App\Models;

use App\Models\BaseModel;

class Organisations extends BaseModel
{
    protected $table       = 'organizations';
   
    protected $fillable    = ['name'];
}
