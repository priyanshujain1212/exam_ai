<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{

    protected $fillable = ['name', 'exam_name', 'exam_url'];
}
