<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveSetting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'is_managerial',
        'initial_balance',
        'annual_increment'
    ];
}
