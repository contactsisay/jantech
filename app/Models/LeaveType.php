<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'allowed_days',
        'is_annual',
        'does_offday_count'
    ];
}
