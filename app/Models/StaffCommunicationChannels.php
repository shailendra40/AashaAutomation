<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCommunicationChannels extends Model
{
    use HasFactory;

    protected $fillable = [
        'communication_channels',
        'workspace_preferences',
        'emergency_information'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
        // return $this->belongsTo(Staff::class, 'staff_id');
    }
}
