<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;

// class Role extends Model
class Role extends SpatieRole
{
    // use HasFactory;
    use HasFactory, HasRoles;

    protected $fillable = ['name', 'guard_name'];

    public function getpermissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id')
            ->where('guard_name', 'web');
    }
}
