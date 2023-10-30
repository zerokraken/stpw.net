<?php

namespace Modules\Fleet\Database\Seeders;

use App\Models\Sidebar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SidebarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $dashboard = Sidebar::where('title',__('Dashboard'))->where('parent_id',0)->where('type','company')->first();

        $Fleet_dash = Sidebar::where('title',__('Fleet Dashboard'))->where('parent_id',$dashboard->id)->where('type','company')->first();
        if($Fleet_dash == null)
        {
                Sidebar::create( [
                'title' => 'Fleet Dashboard',
                'icon' => '',
                'parent_id' => $dashboard->id,
                'sort_order' => 110,
                'route' => 'fleet.dashboard',
                'permissions' => 'fleet dashboard manage',
                'module' => 'Fleet',
                'type'=>'company',
            ]);
        }
        $check = Sidebar::where('title',__('Fleet'))->where('parent_id',0)->exists();
        if(!$check)
        {
            $main = Sidebar::where('title',__('Fleet'))->where('parent_id',0)->where('type','company')->first();
            if($main == null)
            {
                $main = Sidebar::create([
                    'title' => 'Fleet',
                    'icon' => 'ti ti-car',
                    'parent_id' => 0,
                    'sort_order' => 377,
                    'route' => null,
                    'permissions' => 'fleet manage',
                    'module' => 'Fleet',
                    'type'=>'company',
                ]);
            }
            $driver = Sidebar::where('title',__('Driver'))->where('parent_id',$main->id)->where('type','company')->first();
            if($driver == null)
            {
                Sidebar::create([
                    'title' => 'Driver',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 10,
                    'route' => 'driver.index',
                    'permissions' => 'driver manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
            $customer = Sidebar::where('title',__('Customer'))->where('parent_id',$main->id)->where('type','company')->first();
            if($customer == null)
            {
                Sidebar::create([
                    'title' => 'Customer',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 15,
                    'route' => 'fleet_customer.index',
                    'permissions' => 'fleet customer manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
            $vehicle = Sidebar::where('title',__('Vehicle'))->where('parent_id',$main->id)->where('type','company')->first();
            if($vehicle == null)
            {
                Sidebar::create([
                    'title' => 'Vehicle',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 20,
                    'route' => 'vehicle.index',
                    'permissions' => 'vehicle manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
            $booking = Sidebar::where('title',__('Booking'))->where('parent_id',$main->id)->where('type','company')->first();
            if($booking == null)
            {
                Sidebar::create([
                    'title' => 'Booking',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 25,
                    'route' => 'booking.index',
                    'permissions' => 'booking manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
            $availability = Sidebar::where('title',__('Availability'))->where('parent_id',$main->id)->where('type','company')->first();
            if($availability == null)
            {
                Sidebar::create([
                    'title' => 'Availability',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 30,
                    'route' => 'availability.index',
                    'permissions' => 'fleetavailability manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
            $insurance = Sidebar::where('title',__('Insurance'))->where('parent_id',$main->id)->where('type','company')->first();
            if($insurance == null)
            {
                Sidebar::create([
                    'title' => 'Insurance',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 35,
                    'route' => 'insurance.index',
                    'permissions' => 'insurance manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
            $maintenance = Sidebar::where('title',__('Maintenance'))->where('parent_id',$main->id)->where('type','company')->first();
            if($maintenance == null)
            {
                Sidebar::create([
                    'title' => 'Maintenance',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 40,
                    'route' => 'maintenance.index',
                    'permissions' => 'maintenance manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
            $fuel = Sidebar::where('title',__('Fuel History'))->where('parent_id',$main->id)->where('type','company')->first();
            if($fuel == null)
            {
                Sidebar::create([
                    'title' => 'Fuel History',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 45,
                    'route' => 'fuel.index',
                    'permissions' => 'fuel manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
            $Structure = Sidebar::where('title',__('System Setup'))->where('parent_id',$main->id)->where('type','company')->first();
            if($Structure == null)
            {
                $Structure =  Sidebar::create([
                    'title' => 'System Setup',
                    'icon' => '',
                    'parent_id' => $main->id,
                    'sort_order' => 50,
                    'route' => 'license.index',
                    'permissions' => 'license manage',
                    'module' => 'Fleet',
                    'type'=>'company',

                ]);
            }
        }
    }
}
