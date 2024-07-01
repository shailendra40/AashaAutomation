<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPositionAndDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'department',
        'manager_name'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
        // return $this->belongsTo(Staff::class, 'staff_id');
    }
}
