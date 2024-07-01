<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSecurityAndAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'technical_skills',
        'system_access_levels',
        'security_clearance'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
        // return $this->belongsTo(Staff::class, 'staff_id');
    }
}
