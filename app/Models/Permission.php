<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',          // Name of the permission (e.g., create-staff, edit-staff)
        'description',   // Description of the permission
    ];

    // You can define relationships or other methods here

    // Example: A permission belongs to many roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
