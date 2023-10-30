<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Insurance')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Insurance')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-action'); ?>
    <div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('insurance create')): ?>
            <a class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Create New Insurance')); ?>"
                data-url="<?php echo e(route('insurance.create')); ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Create')); ?>">
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
                    <?php echo e(Form::open(['route' => ['insurance.index'], 'method' => 'GET', 'id' => 'frm_submit'])); ?>

                    <div class="d-flex align-items-center justify-content-end">
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box">
                                <?php echo e(Form::text('insurance_provider', isset($_GET['insurance_provider']) ? $_GET['insurance_provider'] : '', ['class' => 'form-control select', 'placeholder' => __('Search Insurance Provider Name')])); ?>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box">
                                <?php echo e(Form::text('policy_number', isset($_GET['policy_number']) ? $_GET['policy_number'] : '', ['class' => 'form-control select', 'placeholder' => __('Search Policy Number')])); ?>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box">
                                <?php echo e(Form::select('vehicle_name', $vehicle, isset($_GET['vehicle_name']) ? $_GET['vehicle_name'] : '', ['class' => 'form-control select', 'placeholder' => __('Select Vehicle Name')])); ?>

                            </div>
                        </div>
                        <div class="col-auto float-end mb-3">
                            <button type="submit"  class="btn btn-sm btn-primary" data-bs-toggle="tooltip"  title="<?php echo e(__('Apply')); ?>" >
                                <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                            </button>
                            <a href="<?php echo e(route('insurance.index')); ?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                title="<?php echo e(__('Reset')); ?>">
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
                                    <th><?php echo e(__('Policy Number')); ?></th>
                                    <th><?php echo e(__('Insurance Provider Name')); ?></th>
                                    <th><?php echo e(__('Vehicle Name')); ?></th>
                                    <th><?php echo e(__('Recurring Date')); ?></th>
                                    <th><?php echo e(__('Recurring Period')); ?></th>
                                    <th><?php echo e(__('Charge Payable')); ?></th>
                                    <th width="200px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $insurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($insurance->policy_number); ?></td>
                                        <td><?php echo e($insurance->insurance_provider); ?></td>
                                        <td>
                                            <?php echo e(!empty($insurance->VehicleName) ? $insurance->VehicleName->name : ''); ?>


                                        </td>
                                        <td> <?php echo e($insurance->scheduled_date); ?></td>
                                        <td>
                                            <?php echo e(!empty($insurance->Recurring) ? $insurance->Recurring->name : ''); ?>


                                        </td>
                                        <td><?php echo e($insurance->charge_payable); ?></td>
                                        <td class="Action">
                                            <span>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('insurance edit')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a class="mx-3 btn btn-sm  align-items-center"
                                                            data-url="<?php echo e(route('insurance.edit', $insurance->id)); ?>"
                                                            data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                                                            title="" data-title="<?php echo e(__('Edit Insurance')); ?>"
                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('insurance delete')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo e(Form::open(['route' => ['insurance.destroy', $insurance->id], 'class' => 'm-0'])); ?>

                                                        <?php echo method_field('DELETE'); ?>
                                                        <a class="mx-3 btn btn-sm  align-items-center bs-pass-para show_confirm"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Delete" aria-label="Delete"
                                                            data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                            data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                            data-confirm-yes="delete-form-<?php echo e($insurance->id); ?>"><i
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/insurance/index.blade.php ENDPATH**/ ?>