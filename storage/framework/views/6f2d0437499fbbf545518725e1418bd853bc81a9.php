<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).on('click', '.code', function () {
            var type = $(this).val();
            if (type == 'manual') {
                $('#manual').removeClass('d-none');
                $('#manual').addClass('d-block');
                $('#auto').removeClass('d-block');
                $('#auto').addClass('d-none');
            } else {
                $('#auto').removeClass('d-none');
                $('#auto').addClass('d-block');
                $('#manual').removeClass('d-block');
                $('#manual').addClass('d-none');
            }
        });

        $(document).on('click', '#code-generate', function () {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Coupon')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
        <?php echo e(__('Coupon')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-action'); ?>
    <div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon create')): ?>
        <a href="#" data-size="md" data-url="<?php echo e(route('coupons.create')); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create New Coupon')); ?>" class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0 pc-dt-simple" id="coupon">
                            <thead>
                            <tr>
                                <th> <?php echo e(__('Name')); ?></th>
                                <th> <?php echo e(__('Code')); ?></th>
                                <th> <?php echo e(__('Discount (%)')); ?></th>
                                <th> <?php echo e(__('Limit')); ?></th>
                                <th> <?php echo e(__('Used')); ?></th>
                                <th> <?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="font-style">
                                    <td><?php echo e($coupon->name); ?></td>
                                    <td><?php echo e($coupon->code); ?></td>
                                    <td><?php echo e($coupon->discount); ?></td>
                                    <td><?php echo e($coupon->limit); ?></td>
                                    <td><?php echo e($coupon->used_coupon()); ?></td>
                                    <td class="Action">
                                        <span>
                                        <div class="action-btn bg-info ms-2">
                                        <a href="<?php echo e(route('coupons.show',$coupon->id)); ?>" class="mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="<?php echo e(__('View')); ?>">
                                            <i class="ti ti-eye text-white"></i>
                                        </a>
                                        </div>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon edit')): ?>
                                        <div class="action-btn bg-primary ms-2">
                                                <a href="#" class="mx-3 btn btn-sm align-items-center" data-url="<?php echo e(route('coupons.edit',$coupon->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Coupon')); ?>" data-bs-toggle="tooltip"  title="<?php echo e(__('Edit')); ?>" data-original-title="<?php echo e(__('Edit')); ?>">
                                                <i class="ti ti-pencil text-white"></i>
                                            </a>
                                        </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon delete')): ?>
                                                <div class="action-btn bg-danger ms-2">
                                                    <?php echo e(Form::open(['route' => ['coupons.destroy', $coupon->id], 'class' => 'm-0'])); ?>

                                                    <?php echo method_field('DELETE'); ?>
                                                    <a href="#"
                                                        class="mx-3 btn btn-sm  align-items-center  show_confirm"
                                                        data-bs-toggle="tooltip" title=""
                                                        data-bs-original-title="Delete" aria-label="Delete"
                                                        data-confirm-yes="delete-form-<?php echo e($coupon->id); ?>"><i
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/resources/views/coupon/index.blade.php ENDPATH**/ ?>