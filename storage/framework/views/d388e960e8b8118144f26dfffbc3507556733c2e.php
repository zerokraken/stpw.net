<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Booking')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Booking')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-action'); ?>
    <div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('booking create')): ?>
            <a class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Create New Booking')); ?>"
                data-url="<?php echo e(route('booking.create')); ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Create')); ?>">
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
                                    <th><?php echo e(__('Customer Name')); ?></th>
                                    <th><?php echo e(__('Vehicle Name')); ?></th>
                                    <th><?php echo e(__('Driver Name')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Trip Type')); ?></th>
                                    <th><?php echo e(__('Total Price')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th width="250px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e(!empty($booking->BookingUser) ? $booking->BookingUser->name : ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e(!empty($booking->vehicle) ? $booking->vehicle->name : ''); ?>

                                        </td>
                                        <td>
                                            <?php echo e(!empty($booking->driver) ? $booking->driver->name : ''); ?>

                                        </td>

                                        <td><?php echo e($booking->start_date); ?>

                                        </td>
                                        <td><?php echo e($booking->trip_type); ?></td>
                                        <td><?php echo e($booking->total_price); ?></td>
                                        <td>
                                            <?php if($booking->status == 'Yet to start'): ?>
                                                <span
                                                    class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__('Yet to start')); ?></span>
                                            <?php elseif($booking->status == 'Completed'): ?>
                                                <span
                                                    class="status_badge badge bg-success p-2 px-3 rounded"><?php echo e(__('Completed')); ?></span>
                                            <?php elseif($booking->status == 'OnGoing'): ?>
                                                <span
                                                    class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__('OnGoing')); ?></span>
                                            <?php else: ?>
                                                <span
                                                    class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__('Cancelled')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="Action">
                                            <span>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('booking show')): ?>
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="<?php echo e(route('booking.show', $booking->id)); ?>"
                                                            class="mx-3 btn btn-sm  align-items-center" data-bs-toggle="tooltip"
                                                            title="" data-bs-original-title="<?php echo e(__('Show')); ?>">
                                                            <i class="ti ti-eye text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('booking edit')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a class="mx-3 btn btn-sm  align-items-center"
                                                            data-url="<?php echo e(route('booking.edit', $booking->id)); ?>"
                                                            data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                                                            title="" data-title="<?php echo e(__('Edit Booking')); ?>"
                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('booking delete')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo e(Form::open(['route' => ['booking.destroy', $booking->id], 'class' => 'm-0'])); ?>

                                                        <?php echo method_field('DELETE'); ?>
                                                        <a class="mx-3 btn btn-sm  align-items-center bs-pass-para show_confirm"
                                                            data-bs-toggle="tooltip" title=""
                                                            data-bs-original-title="Delete" aria-label="Delete"
                                                            data-confirm="<?php echo e(__('Are You Sure?')); ?>"
                                                            data-text="<?php echo e(__('This action can not be undone. Do you want to continue?')); ?>"
                                                            data-confirm-yes="delete-form-<?php echo e($booking->id); ?>"><i
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/booking/index.blade.php ENDPATH**/ ?>