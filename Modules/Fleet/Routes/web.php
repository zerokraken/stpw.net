<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::prefix('fleet')->group(function() {
    Route::get('/', 'FleetController@index');
});

Route::get('dashboard/fleet',['as' => 'fleet.dashboard','uses' =>'FleetController@index'])->middleware(['auth']);

Route::resource('driver', 'DriverController')->middleware(
    [
        'auth',
    ]
);
Route::get('driver-grid', 'DriverController@grid')->name('driver.grid')->middleware(
    [
        'auth'
    ]
);
Route::resource('license', 'LicenseController')->middleware(
    [
        'auth',
    ]
);
Route::resource('vehicleType', 'VehicleTypeController')->middleware(
    [
        'auth',
    ]
);
Route::resource('fuelType', 'FuelTypeController')->middleware(
    [
        'auth',
    ]
);
Route::resource('recuerring', 'RecurringController')->middleware(
    [
        'auth',
    ]
);
Route::resource('maintenanceType', 'MaintenanceTypeController')->middleware(
    [
        'auth',
    ]
);
Route::resource('fleet_customer', 'CustomerController')->middleware(
    [
        'auth',
    ]
);
Route::resource('vehicle', 'VehicleController')->middleware(
    [
        'auth',
    ]
);
Route::resource('insurance', 'InsuranceController')->middleware(
    [
        'auth',
    ]
);
Route::resource('fuel', 'FuelController')->middleware(
    [
        'auth',
    ]
);
Route::resource('booking', 'BookingController')->middleware(
    [
        'auth',
    ]
);

Route::get('Addpayment/{id}', 'BookingController@Addpayment')->name('Addpayment.create');
Route::post('Addpayment/store/{id}', 'BookingController@PaymentStore')->name('Addpayment.store');
Route::DELETE('payment/destory/{id}/', 'BookingController@PaymentDestory')->name('payment.delete');

Route::resource('maintenance', 'MaintenanceController')->middleware(
    [
        'auth',
    ]
);
Route::resource('availability', 'AvailabilityController')->middleware(
    [
        'auth',
    ]
);




