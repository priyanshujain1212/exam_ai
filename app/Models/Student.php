<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',
        'organization',
        'exam',
        'free_mock_tests',
        'is_registered',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
