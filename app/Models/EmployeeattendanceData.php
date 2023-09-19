<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeattendanceData extends Model
{
    use HasFactory;

    protected $fillable = [
        'employeeattendance_id',
        'employee_id',
        'attendance',
        'employee_name'
    ];
}
