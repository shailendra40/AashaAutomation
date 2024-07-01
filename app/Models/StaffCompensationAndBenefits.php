<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCompensationAndBenefits extends Model
{
    use HasFactory;

    protected $fillable = [
        'salary',
        'bank_account_details',
        'benefits_information'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
        // return $this->belongsTo(Staff::class, 'staff_id');
    }
}
