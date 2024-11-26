<?php

namespace App\Models;

use App\Models\BaseModel;

class Organization extends BaseModel
{
    protected $table       = 'organizations';
    protected $auditColumn = false;
    protected $fillable    = ['id' , 'name' , 'exam_name', 'exam_url'];
}
