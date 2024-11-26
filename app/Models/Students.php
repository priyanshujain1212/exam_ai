<?php

namespace App\Models;

use App\Models\BaseModel;

class Students extends BaseModel
{
    protected $table       = 'students';
    protected $auditColumn = false;
    protected $fillable    = ['id' , 'name' , 'organization', 'exam', 'free_mock_tests', 'is_registered'];
}
