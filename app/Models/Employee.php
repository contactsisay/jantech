<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'employment_date',
        'address'
    ];

    protected $casts = [
        'dob' => 'datetime',
        'employment_date' => 'datetime'
    ];
}
