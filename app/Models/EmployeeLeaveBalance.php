<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveBalance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'employee_id',
        'year',
        'initial_balance',
        'total_taken',
        'left_balance',
        'expiry_date',
        'description'
    ];

    protected $casts = [
        'effective_date' => 'datetime',
        'given_date' => 'datetime',
        'return_date' => 'datetime',
    ];
}