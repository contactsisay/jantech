<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeOffday extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'weekday',
        'expiry_date'
    ];

    protected $casts = [
        'expiry_date' => 'datetime',
    ];
}
