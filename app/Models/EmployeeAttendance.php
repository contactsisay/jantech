<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'absent_date',
        'absence_reason',
        'file_path'
    ];

    protected $casts = [
        'absent_date' => 'datetime',
    ];
}
