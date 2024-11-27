<?php

namespace App\Models;

use App\Models\BaseModel;

class Exams extends BaseModel
{
    protected $table       = 'exams';
   
    protected $fillable    = ['Exam', 'organization'];

    public function organization()
    {
        return $this->belongsTo(Organisations::class, 'name');
    }

}
