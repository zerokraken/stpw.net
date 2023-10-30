<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Fuel')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Fuel')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-action'); ?>
    <div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fuel create')): ?>
            <a class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Create New Fuel')); ?>"
                data-url="<?php echo e(route('fuel.create')); ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Create')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple" id="assets">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Driver Name')); ?></th>
                                    <th><?php echo e(__('Vehicle Name')); ?></th>
                                    <th><?php echo e(__('Fueling Date and Time')); ?></th>
                                    <th><?php echo e(__('Fuel Type')); ?></th>
                                    <th><?php echo e(__('Gallons/Liters of Fuel')); ?></th>
                                    <th><?php echo e(__('Cost per Gallon/Liter')); ?></th>
                                    <th><?php echo e(__('Total Cost')); ?></th>
                                    <th><?php echo e(__('Odometer Reading')); ?></th>
                                    <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $Fuels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Fuel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td>
                                            <?php echo e(!empty($Fuel->driver) ? $Fuel->driver->name : ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e(!empty($Fuel->vehicle) ? $Fuel->vehicle->name : ''); ?>

                                        </td>

                                        <td> <?php echo e($Fuel->fill_date); ?></td>
                                        <td>
                                            <?php echo e(!empty($Fuel->FuelType) ? $Fuel->FuelType->name : ''); ?>


                                        </td>
                                        <td> <?php echo e($Fuel->quantity); ?></td>
                                        <td> <?php echo e($Fuel->cost); ?></td>
                                        <td> <?php echo e($Fuel->total_cost); ?></td>
                                        <td> <?php echo e($Fuel->odometer_reading); ?></td>
                                        <td class="Action text-end">
                                            <span>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fuel edit')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a class="mx-3 btn btn-sm  align-items-center"
                                                            data-url="<?php echo e(route('fuel.edit', $Fuel->id)); ?>"
                                                            data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                                                            title="" data-title="<?php echo e(__('Edit Fuel')); ?>"
                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fuel delete')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo e(Form::open(['route' => ['fuel.destroy', $Fuel->id], 'class' => 'm-0'])); ?>

                                                        <?php echo method_field('DELETE'); ?>
                                                        <a class="mx-3 btn btn-sm  align-items-center bs-pass-para show_confirm"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Delete" aria-label="Delete"
                                                            data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                            data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                            data-confirm-yes="delete-form-<?php echo e($Fuel->id); ?>"><i
                                                                class="ti ti-trash text-white text-white"></i></a>
                                                        <?php echo e(Form::close()); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </span>
                                        </td>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/fuel/index.blade.php ENDPATH**/ ?>