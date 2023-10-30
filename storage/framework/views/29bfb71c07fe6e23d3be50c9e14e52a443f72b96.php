<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Fleet')); ?>

<?php $__env->stopSection(); ?>

<?php
    $user = \Auth::user();
?>

<?php $__env->startSection('content'); ?>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xxl-7">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-warning">
                                    <i class="ti ti-users"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                <h6 class="mb-3"><?php echo e('Customers'); ?></h6>
                                <h3 class="mb-0"><?php echo e($Customers['customer']); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-danger">
                                    <i class="ti ti-truck-delivery"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                <h6 class="mb-3"><?php echo e('Drivers'); ?></h6>
                                <h3 class="mb-0"><?php echo e($Drivers['driver']); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-primary">
                                    <i class="ti ti-car"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                <h6 class="mb-3"><?php echo e(__('Vehicle')); ?></h6>
                                <h3 class="mb-0"><?php echo e($Vehicle['vehicle']); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-info">
                                    <i class="ti ti-book"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"><?php echo e(__('Total')); ?></p>
                                <h6 class="mb-3"><?php echo e(('Booking')); ?></h6>
                                <h3 class="mb-0"><?php echo e($Booking['booking']); ?> </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5><?php echo e(__('Latest Bookings')); ?> </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Customer Name')); ?></th>
                                        <th><?php echo e(__('Vechicle Name')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('Trip Type')); ?></th>
                                        <th><?php echo e(__('Total Price')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e(!empty($booking->BookingUser) ? $booking->BookingUser->name : ''); ?>

                                            </td>
                                            <td><?php echo e(!empty($booking->vehicle) ? $booking->vehicle->name : ''); ?>

                                            </td>
                                            <td><?php echo e($booking->start_date); ?> <br>
                                                <b><?php echo e(__('To')); ?></b><br><?php echo e($booking->end_date); ?>

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
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5">


                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Maintenance'.' '.'&'.' '.'Fuel'.' '.'&'.' '.'Booking')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div id="myChart"></div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5><?php echo e(__('Booking Status')); ?></h5>
                        <span class="text-sm text-muted">(<?php echo e($curr_month); ?>)
                            <?php echo e('Total booking of last month'); ?></span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-6 my-2">
                                <div class="d-flex align-items-start">
                                    <div class="theme-avtar bg-primary">
                                        <i class="ti ti-book"></i>
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Yet To Start')); ?></p>
                                        <h4 class="mb-0 text-primary"><?php echo e($curr_start); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 my-2">
                                <div class="d-flex align-items-start">
                                    <div class="theme-avtar bg-info">
                                        <i class="ti ti-book"></i>
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-muted text-sm mb-0"><?php echo e(__('On Going')); ?></p>
                                        <h4 class="mb-0 text-info"><?php echo e($curr_ongoing); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 my-2">
                                <div class="d-flex align-items-start">
                                    <div class="theme-avtar bg-warning">
                                        <i class="ti ti-book"></i>
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Complete')); ?></p>
                                        <h4 class="mb-0 text-warning"><?php echo e($curr_complete); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 my-2">
                                <div class="d-flex align-items-start">
                                    <div class="theme-avtar bg-danger">
                                        <i class="ti ti-book"></i>
                                    </div>
                                    <div class="ms-2">
                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Cancelled')); ?></p>
                                        <h4 class="mb-0 text-danger"><?php echo e($curr_cancelled); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('Modules/Fleet/Resources/assets/js/apexcharts.js')); ?>"></script>

<script>
    (function() {
        "use strict";
        var options = {
            chart: {
                height: 250,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
                curve: 'smooth'
            },

            series: [{
                name: "Maintenance",
                data: <?php echo json_encode($chartData['maintenance']); ?>

                }, {
                name: "Fuel",
                data: <?php echo json_encode($chartData['fuel']); ?>

                },{
                name: "Booking",
                data: <?php echo json_encode($chartData['booking']); ?>

                }],


            xaxis: {
                categories:<?php echo json_encode($chartData['date']); ?>,
                title: {
                    text: "<?php echo e(__('Days')); ?>"
                }
            },
            colors: ['#453b85', '#FF3A6E', '#3ec9d6'],

            grid: {
                strokeDashArray: 4,
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'right',
            },
            yaxis: {
                tickAmount: 6,

            }

        };
        var chart = new ApexCharts(document.querySelector("#myChart"), options);
        chart.render();
    })();

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/dashboard/index.blade.php ENDPATH**/ ?>