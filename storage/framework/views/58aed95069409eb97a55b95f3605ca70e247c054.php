<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Vehicle Calendar')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Vehicle Calendar')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('Modules/Fleet/Resources/assets/css/main.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Calendar')); ?></h5>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4"><?php echo e(__('Bookings')); ?></h4>
                    <ul class="event-cards list-group list-group-flush mt-3 w-100">

                        <?php $__currentLoopData = json_decode($calenderDatas,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calenderData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $month = date('m', strtotime($calenderData['start']));
                            ?>
                            <?php if($month == date('m')): ?>
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-primary">
                                                    <i class="ti ti-calendar-event"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="m-0">
                                                        <a class="fc-daygrid-event"
                                                            style="white-space: inherit;">
                                                            <div class="fc-event-title-container">
                                                                
                                                                    <div class="fc-event-title text-dark"><?php echo e($calenderData['notes']); ?>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h6>
                                                    <small class="text-muted"><?php echo e($calenderData['start']); ?> to
                                                        <?php echo e($calenderData['end']); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script src="<?php echo e(asset('Modules/Fleet/Resources/assets/js/apexcharts.js')); ?>"></script>
<script>
    $(document).ready(function() {
        get_data();
    });

    function get_data() {
        $.ajax({
            success: function(data) {
                (function() {
                    "use strict";
                    var etitle;
                    var etype;
                    var etypeclass;
                    var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        buttonText: {
                            timeGridDay: "<?php echo e(__('Day')); ?>",
                            timeGridWeek: "<?php echo e(__('Week')); ?>",
                            dayGridMonth: "<?php echo e(__('Month')); ?>"
                        },
                        themeSystem: 'bootstrap',
                        navLinks: true,
                        droppable: true,
                        selectable: true,
                        selectMirror: true,
                        editable: true,
                        dayMaxEvents: true,
                        handleWindowResize: true,
                        events: <?php echo json_encode($arrEvents); ?>,
                    });

                    calendar.render();

                })();
            }
        });
    }

    $(document).on('click', '.fc-daygrid-event', function(e) {
        "use strict";
        if ($(this).attr('href') != undefined) {
            if (!$(this).hasClass('deal')) {

                e.preventDefault();
                var event = $(this);
                var title = $(this).find('.fc-event-title-container .fc-event-title').html();

                var size = 'md';
                var url = $(this).attr('href');
                var parts = url.split("/");

                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $.ajax({
                    url: url,
                    success: function(data) {
                        console.log(data);
                        $('#commonModal .body').html(data);
                        $("#commonModal").modal('show');
                    },
                    error: function(data) {
                        data = data.responseJSON;
                        toastr('Error', data.error, 'error')
                    }
                });
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/availability/index.blade.php ENDPATH**/ ?>