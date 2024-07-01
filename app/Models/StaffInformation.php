<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        // 'staff_id',
        'employee_id',
        'date_of_birth',
        'gender',
        'nationality'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
        // return $this->belongsTo(Staff::class, 'staff_id');
    }
}
