<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Driver')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Driver')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-action'); ?>
    <div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('driver create')): ?>
            <a class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Create New Driver')); ?>"
                data-url="<?php echo e(route('driver.create')); ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Create')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
        <a href="<?php echo e(route('driver.grid')); ?>" class="btn btn-sm btn-primary btn-icon"
            data-bs-toggle="tooltip"title="<?php echo e(__('Grid View')); ?>">
            <i class="ti ti-layout-grid text-white"></i>
        </a>
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
                                    <th>#</th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('Lincese Number')); ?></th>
                                    <th><?php echo e(__('Lincese Type')); ?></th>
                                    <th><?php echo e(__('Working Hour')); ?></th>
                                    <th><?php echo e(__('Lincese Expire Date')); ?></th>
                                    <th><?php echo e(__('Join Date')); ?></th>
                                    <?php if(Gate::check('driver edit') || Gate::check('driver delete') || Gate::check('driver show')): ?>
                                        <th width="10%"> <?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <th scope="row"><?php echo e(++$index); ?></th>
                                        <td><?php echo e($driver->name); ?></td>
                                        <td><?php echo e($driver->email); ?></td>
                                        <?php if($driver->lincese_number): ?>
                                            <td><?php echo e($driver->lincese_number); ?></td>
                                        <?php else: ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <?php if($driver->lincese_type): ?>
                                            <td>
                                                <?php echo e(!empty(\Modules\Fleet\Entities\FleetUtility::getLinceseType($driver->lincese_type)) ? \Modules\Fleet\Entities\FleetUtility::getLinceseType($driver->lincese_type)->name : ''); ?>

                                            </td>
                                        <?php else: ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <?php if($driver->Working_time): ?>
                                            <td><?php echo e($driver->Working_time); ?></td>
                                        <?php else: ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <?php if($driver->expiry_date): ?>
                                            <td><?php echo e($driver->expiry_date); ?></td>
                                        <?php else: ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <?php if($driver->join_date): ?>
                                            <td><?php echo e($driver->join_date); ?></td>
                                        <?php else: ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td class="Action ignore">
                                            <span>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('driver edit')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a class="mx-3 btn btn-sm  align-items-center"
                                                            data-url="<?php echo e(route('driver.edit', $driver->id)); ?>"
                                                            data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                                                            title="" data-title="<?php echo e(__('Edit Driver')); ?>"
                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php
                                                    $user = \App\Models\User::where('id', $driver->user_id)->first();
                                                ?>
                                                <?php if(!empty($user->id)): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('driver delete')): ?>
                                                        <div class="action-btn bg-danger ms-2">
                                                            <?php echo e(Form::open(['route' => ['driver.destroy', $driver->id], 'class' => 'm-0'])); ?>

                                                            <?php echo method_field('DELETE'); ?>
                                                            <a class="mx-3 btn btn-sm  align-items-center bs-pass-para show_confirm"
                                                                data-bs-toggle="tooltip" title=""
                                                                data-bs-original-title="Delete" aria-label="Delete"
                                                                data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                                data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                                data-confirm-yes="delete-form-<?php echo e($driver->id); ?>"><i
                                                                    class="ti ti-trash text-white text-white"></i></a>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    <?php endif; ?>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/driver/index.blade.php ENDPATH**/ ?>