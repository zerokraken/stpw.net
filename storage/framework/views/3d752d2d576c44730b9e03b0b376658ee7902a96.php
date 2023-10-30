<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Recurring')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Manage Recurring')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-action'); ?>
    <div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recuerring create')): ?>
            <a class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="md" data-title="<?php echo e(__('Create Recurring Period')); ?>"
                data-url="<?php echo e(route('recuerring.create')); ?>" data-bs-toggle="tooltip"
                data-bs-original-title="<?php echo e(__('Create')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-3">
            <?php echo $__env->make('fleet::layouts.fleet_setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 ">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Recurring Period Name')); ?></th>
                                    <?php if(Gate::check('recuerring edit') || Gate::check('recuerring delete')): ?>
                                        <th width="200px"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $Recurrings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Recurring): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($Recurring->name); ?></td>
                                        <?php if(Gate::check('recuerring edit') || Gate::check('recuerring delete')): ?>
                                            <td class="Action">
                                                <span>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recuerring edit')): ?>
                                                        <div class="action-btn bg-info ms-2">
                                                            <a class="mx-3 btn btn-sm  align-items-center"
                                                                data-url="<?php echo e(route('recuerring.edit', $Recurring->id)); ?>"
                                                                data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip"
                                                                title="" data-title="<?php echo e(__('Edit Allowance Option')); ?>"
                                                                data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recuerring delete')): ?>
                                                        <div class="action-btn bg-danger ms-2">
                                                            <?php echo e(Form::open(['route' => ['recuerring.destroy', $Recurring->id], 'class' => 'm-0'])); ?>

                                                            <?php echo method_field('DELETE'); ?>
                                                            <a class="mx-3 btn btn-sm  align-items-center bs-pass-para show_confirm"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Delete" aria-label="Delete"
                                                                data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                data-confirm-yes="delete-form-<?php echo e($Recurring->id); ?>"><i
                                                                    class="ti ti-trash text-white text-white"></i></a>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php echo $__env->make('layouts.nodatafound', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/recurring/index.blade.php ENDPATH**/ ?>