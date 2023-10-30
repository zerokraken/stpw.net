<?php

namespace Modules\Fleet\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class FleetUtility extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Fleet\Database\factories\FleetUtilityFactory::new();
    }

    public static function getLinceseType($license_type)
    {
        $license = License::where('id', $license_type)->first();
        return $license;
    }

    public static function GivePermissionToRoles($role_id = null, $rolename = null)
    {
        $client_permissions = [

            'fleet manage',
            'booking manage',
            'booking create',
            'booking edit',
            'booking show',
            'payment booking manage',
            'payment booking delete',
            'fleetavailability manage',
            'fleetavailability show',
            'fleet dashboard manage',
        ];

        $staff_permissions = [

            'fleet manage',
            'vehicle manage',
            'maintenance manage',
            'maintenance create',
            'maintenance edit',
            'maintenance delete',
            'fleet dashboard manage',
        ];

        $driver_permission=[

            'fleet manage',
            'vehicle manage',
            'fuel manage',
            'fuel create',
            'fuel edit',
            'fuel delete',
            'fleet dashboard manage',
        ];


        if ($role_id == Null) {
            // client
            $roles_c = Role::where('name', 'client')->get();
            foreach ($roles_c as $role) {
                foreach ($client_permissions as $permission_c) {
                    $permission = Permission::where('name', $permission_c)->first();
                    $role->givePermissionTo($permission);
                }
            }

            // staff
            $roles_v = Role::where('name', 'staff')->get();

            foreach ($roles_v as $role) {
                foreach ($staff_permissions as $permission_v) {
                    $permission = Permission::where('name', $permission_v)->first();
                    $role->givePermissionTo($permission);
                }
            }
            // driver
            $roles_v = Role::where('name', 'driver')->get();

            foreach ($roles_v as $role) {
                foreach ($driver_permission as $permission_v) {
                    $permission = Permission::where('name', $permission_v)->first();
                    $role->givePermissionTo($permission);
                }
            }
        } else {
            if ($rolename == 'client') {
                $roles_c = Role::where('name', 'client')->where('id', $role_id)->first();
                foreach ($client_permissions as $permission_c) {
                    $permission = Permission::where('name', $permission_c)->first();
                    $roles_c->givePermissionTo($permission);
                }
            } elseif ($rolename == 'staff') {
                $roles_v = Role::where('name', 'staff')->where('id', $role_id)->first();
                foreach ($staff_permissions as $permission_v) {
                    $permission = Permission::where('name', $permission_v)->first();
                    $roles_v->givePermissionTo($permission);
                }
            }
            elseif ($rolename == 'driver') {
                $roles_v = Role::where('name', 'driver')->where('id', $role_id)->first();
                foreach ($driver_permission as $permission_v) {
                    $permission = Permission::where('name', $permission_v)->first();
                    $roles_v->givePermissionTo($permission);
                }
            }
        }
    }
}
