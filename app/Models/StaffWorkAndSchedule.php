<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffWorkAndSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_hours',
        'days_of_week'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
        // return $this->belongsTo(Staff::class, 'staff_id');
    }
}
