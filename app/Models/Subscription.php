<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
  

    protected $fillable = [
        'student_id',
        'exam',
        'start_date',
        'end_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
