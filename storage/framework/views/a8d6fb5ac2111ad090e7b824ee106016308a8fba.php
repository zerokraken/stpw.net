<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Vehicle')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Vehicle')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-action'); ?>
    <div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehicle create')): ?>
            <a class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Create New Vehicle')); ?>"
                data-url="<?php echo e(route('vehicle.create')); ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Create')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-sm-12 col-lg-12 col-xl-12 col-md-12">
        <div class=" mt-2" id="" style="">
            <div class="card">
                <div class="card-body">
                    <?php echo e(Form::open(['route' => ['vehicle.index'], 'method' => 'GET', 'id' => 'frm_submit'])); ?>

                    <div class="d-flex align-items-center justify-content-end">
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box">
                                <?php echo e(Form::text('name', isset($_GET['name']) ? $_GET['name'] : '', ['class' => 'form-control select', 'placeholder' => __('Search Name')])); ?>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box">
                                <?php echo e(Form::select('vehicle_type', $vehicleTypes, isset($_GET['vehicle_type']) ? $_GET['vehicle_type'] : '', ['class' => 'form-control select', 'placeholder' => __('Select Vehicle Type')])); ?>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box">

                                <?php echo e(Form::select('fuel_type', $fuelType, isset($_GET['fuel_type']) ? $_GET['fuel_type'] : '', ['class' => 'form-control select', 'placeholder' => __('Select Fuel Type')])); ?>

                            </div>
                        </div>
                        <div class="col-auto float-end ms-2 mb-4">
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="apply">
                                <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                            </button>
                            <a href="<?php echo e(route('vehicle.index')); ?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                title="" data-bs-original-title="Reset">
                                <span class="btn-inner--icon"><i class="ti ti-trash-off text-white-off "></i></span>
                            </a>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple" id="assets">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Vehicle Name')); ?></th>
                                    <th><?php echo e(__('Vehicle Type')); ?></th>
                                    <th><?php echo e(__('Fuel Type')); ?></th>
                                    <th><?php echo e(__('Registration Date')); ?></th>
                                    <th><?php echo e(__('Driver Name')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <th width="200px"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($vehicle->name); ?></td>

                                        <td><?php echo e(!empty($vehicle->VehicleType) ? $vehicle->VehicleType->name : ''); ?></td>

                                        <td><?php echo e(!empty($vehicle->FuelType) ? $vehicle->FuelType->name : ''); ?></td>

                                        <td><?php echo e(!empty($vehicle->registration_date) ? $vehicle->registration_date : '-'); ?></td>

                                        <td><?php echo e(!empty($vehicle->driver) ? $vehicle->driver->name : ''); ?></td>

                                        <td><?php echo e(!empty($vehicle->status) ? $vehicle->status : '-'); ?></td>

                                        <?php if(\Auth::user()->type == 'company'): ?>
                                            <td class="Action">
                                                <span>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehicle edit')): ?>
                                                        <div class="action-btn bg-info ms-2">
                                                            <a class="mx-3 btn btn-sm  align-items-center"
                                                                data-url="<?php echo e(route('vehicle.edit', $vehicle->id)); ?>"
                                                                data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                                                                title="" data-title="<?php echo e(__('Edit vehicle')); ?>"
                                                                data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehicle delete')): ?>
                                                        <div class="action-btn bg-danger ms-2">
                                                            <?php echo e(Form::open(['route' => ['vehicle.destroy', $vehicle->id], 'class' => 'm-0'])); ?>

                                                            <?php echo method_field('DELETE'); ?>
                                                            <a class="mx-3 btn btn-sm  align-items-center bs-pass-para show_confirm"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Delete" aria-label="Delete"
                                                                data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                data-confirm-yes="delete-form-<?php echo e($vehicle->id); ?>"><i
                                                                    class="ti ti-trash text-white text-white"></i></a>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/vehicle/index.blade.php ENDPATH**/ ?>