<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'leave_type_id',
        'from_year',
        'given_days',
        'effective_date',
        'given_date',
        'return_date',
        'file_path'
    ];

    protected $casts = [
        'effective_date' => 'datetime',
        'given_date' => 'datetime',
        'return_date' => 'datetime',
    ];
}
