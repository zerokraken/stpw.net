<?php

namespace Modules\Fleet\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Artisan::call('cache:clear');

        $permission  = [
            'fleet manage',
            'driver manage',
            'driver create',
            'driver edit',
            'driver delete',
            'license manage',
            'license create',
            'license edit',
            'license delete',
            'vehicletype manage',
            'vehicletype create',
            'vehicletype edit',
            'vehicletype delete',
            'fueltype manage',
            'fueltype create',
            'fueltype edit',
            'fueltype delete',
            'recuerring manage',
            'recuerring create',
            'recuerring edit',
            'recuerring delete',
            'maintenanceType manage',
            'maintenanceType create',
            'maintenanceType edit',
            'maintenanceType delete',
            'fleet customer manage',
            'fleet customer create',
            'fleet customer edit',
            'fleet customer delete',
            'vehicle manage',
            'vehicle create',
            'vehicle edit',
            'vehicle delete',
            'insurance manage',
            'insurance create',
            'insurance edit',
            'insurance delete',
            'fuel manage',
            'fuel create',
            'fuel edit',
            'fuel delete',
            'booking manage',
            'booking create',
            'booking edit',
            'booking show',
            'booking delete',
            'payment booking manage',
            'payment booking delete',
            'maintenance manage',
            'maintenance create',
            'maintenance edit',
            'maintenance delete',
            'fleet dashboard manage',
            'fleetavailability manage',
            'fleetavailability show',


        ];
        $company_role = Role::where('name', 'company')->first();
        foreach ($permission as $key => $value) {
            $table = Permission::where('name', $value)->where('module', 'Fleet')->exists();
            if (!$table) {
                $data = Permission::create(
                    [
                        'name' => $value,
                        'guard_name' => 'web',
                        'module' => 'Fleet',
                        'created_by' => 0,
                        "created_at" => date('Y-m-d H:i:s'),
                        "updated_at" => date('Y-m-d H:i:s')
                    ]
                );
                $company_role->givePermissionTo($data);
            }
        }
    }
}
