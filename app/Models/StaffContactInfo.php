<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'email',
        'emergency_contact'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
        // return $this->belongsTo(Staff::class, 'staff_id');
    }
}
