<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Maintenance')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Maintenance')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-action'); ?>
    <div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('maintenance create')): ?>
            <a class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Create New Maintenance')); ?>"
                data-url="<?php echo e(route('maintenance.create')); ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Create')); ?>">
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
                    <?php echo e(Form::open(['route' => ['maintenance.index'], 'method' => 'get', 'id' => 'frm_submit'])); ?>

                    <div class="d-flex align-items-center justify-content-end">
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box form-group">

                                <?php echo e(Form::text('service_type', isset($_GET['service_type']) ? $_GET['service_type'] : '', ['class' => 'form-control', 'placeholder' => 'Search Service Type'])); ?>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box form-group">
                                <?php echo e(Form::text('service_name', isset($_GET['service_name']) ? $_GET['service_name'] : '', ['class' => 'form-control select', 'placeholder' => 'Search Service Name'])); ?>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box form-group">
                                <?php echo e(Form::select('maintenance_type', $MaintenanceType, isset($_GET['maintenance_type']) ? $_GET['maintenance_type'] : '', ['class' => 'form-control select'])); ?>

                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-12 col-12 mx-2">
                            <div class="btn-box form-group">
                                <?php echo e(Form::select('priority', ['High', 'Medium', 'Low'], isset($_GET['priority']) ? $_GET['priority'] : '', ['class' => 'form-control select', 'placeholder' => 'Select Priority'])); ?>

                            </div>
                        </div>
                        <div class="col-auto float-end ms-2 mb-4">
                            <button type="submit" href="#" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="<?php echo e(__('Apply')); ?>" >
                                <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                            </button>
                            <a href="<?php echo e(route('maintenance.index')); ?>" class="btn btn-sm btn-danger"
                                data-bs-toggle="tooltip" title="<?php echo e(__('Reset')); ?>">
                                <span class="btn-inner--icon"><i class="ti ti-trash-off text-white-off"></i></span>
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
                                    <th><?php echo e(__('Service Type')); ?></th>
                                    <th><?php echo e(__('Vehicle Name')); ?></th>
                                    <th><?php echo e(__('Maintenance Type')); ?></th>
                                    <th><?php echo e(__('Maintenance Service Name')); ?></th>
                                    <th><?php echo e(__('Maintenance Date')); ?></th>
                                    <th><?php echo e(__('Priority')); ?></th>
                                    <th width="200px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $Maintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Maintenance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($Maintenance->service_type); ?></td>
                                        <td>

                                            <?php echo e(!empty($Maintenance->VehicleName) ? $Maintenance->VehicleName->name : ''); ?>


                                        </td>

                                        <td>
                                            <?php echo e(!empty($Maintenance->MaintenanceType) ? $Maintenance->MaintenanceType->name : ''); ?>


                                        </td>
                                        <td> <?php echo e($Maintenance->service_name); ?></td>
                                        <td> <?php echo e($Maintenance->maintenance_date); ?></td>
                                        <td> <?php echo e($Maintenance->priority); ?> </td>
                                        <td class="Action">
                                            <span>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('maintenance edit')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a class="mx-3 btn btn-sm  align-items-center"
                                                            data-url="<?php echo e(route('maintenance.edit', $Maintenance->id)); ?>"
                                                            data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                                                            title="" data-title="<?php echo e(__('Edit Maintenance')); ?>"
                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('maintenance delete')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo e(Form::open(['route' => ['maintenance.destroy', $Maintenance->id], 'class' => 'm-0'])); ?>

                                                        <?php echo method_field('DELETE'); ?>
                                                        <a class="mx-3 btn btn-sm  align-items-center bs-pass-para show_confirm"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Delete" aria-label="Delete"
                                                            data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                            data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                            data-confirm-yes="delete-form-<?php echo e($Maintenance->id); ?>"><i
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/maintenance/index.blade.php ENDPATH**/ ?>