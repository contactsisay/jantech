<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'start',
        'start_break',
        'end_break',
        'end',
        'attendance_date'
    ];

    protected $casts = [
        'attendance_date' => 'datetime',
    ];
}
