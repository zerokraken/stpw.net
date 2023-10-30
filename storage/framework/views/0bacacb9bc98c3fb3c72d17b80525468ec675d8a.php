<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Project Report')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-breadcrumb'); ?>
    <?php echo e(__('Project Report')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-action'); ?>
    <div>
        <a href="#" class="btn btn-sm btn-primary filter" data-toggle="tooltip" title="<?php echo e(__('Filter')); ?>">
            <i class="ti ti-filter"></i>
        </a>
    </div>
<?php $__env->stopSection(); ?>
<?php

    $client_keyword = Auth::user()->hasRole('client') ? 'client.' : '';
?>

<?php $__env->startSection('content'); ?>

    <div class="row  display-none" id="show_filter">

        <?php if(Auth::user()->hasRole('company') || Auth::user()->hasRole('client')): ?>
            <div class="col-2">
                <select class="select2 form-select" name="all_users" id="all_users">
                    <option value="" class="px-4"><?php echo e(__('All Users')); ?></option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        <?php endif; ?>

        <div class="col-3">
            <select class="select2 form-select" name="status" id="status">
                <option value="" class="px-4"><?php echo e(__('All Status')); ?></option>

                <option value="Ongoing"><?php echo e(__('Ongoing')); ?></option>
                <option value="Finished"><?php echo e(__('Finished')); ?></option>
                <option value="OnHold"><?php echo e(__('OnHold')); ?></option>

            </select>
        </div>


        <div class="form-group col-md-3">
            <div class="input-group date ">
                <input class="form-control" type="date" id="start_date" name="start_date" value=""
                    autocomplete="off" required="required" placeholder="<?php echo e(__('Start Date')); ?>">
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="input-group date ">
                <input class="form-control" type="date" id="end_date" name="end_date" value=""
                    autocomplete="off" required="required" placeholder="<?php echo e(__('End Date')); ?>">
            </div>
        </div>
        <div class="col-1">

            <button class=" btn btn-primary btn-filter apply"><?php echo e(__('Apply')); ?></button>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 mt-4">
            <div class="card">
                <div class="card-body table-border-style mt-3 mx-2">
                    <div class="table-responsive">
                        <table class="table selection-datatable px-4 mt-2" id="selection-datatable1">
                            <thead>
                                <tr>
                                    <th> <?php echo e(__('#')); ?></th>
                                    <th> <?php echo e(__('Project Name')); ?></th>
                                    <th> <?php echo e(__('Start Date')); ?></th>
                                    <th> <?php echo e(__('Due Date')); ?></th>
                                    <th> <?php echo e(__('Project Member')); ?></th>
                                    <th> <?php echo e(__('Progress')); ?></th>
                                    <th><?php echo e(__('Project Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(Module::asset('Taskly:Resources/assets/css/datatables.min.css')); ?>">


    <style>
        table.dataTable.no-footer {
            border-bottom: none !important;
        }

        .display-none {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(Module::asset('Taskly:Resources/assets/js/jquery.dataTables.min.js')); ?>"></script>

    <script>
        var dataTableLang = {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            },
            lengthMenu: "<?php echo e(__('Show')); ?> _MENU_ <?php echo e(__('entries')); ?>",
            zeroRecords: "<?php echo e(__('No data available in table.')); ?>",
            info: "<?php echo e(__('Showing')); ?> _START_ <?php echo e(__('to')); ?> _END_ <?php echo e(__('of')); ?> _TOTAL_ <?php echo e(__('entries')); ?>",
            infoEmpty: "<?php echo e(__('Showing 0 to 0 of 0 entries')); ?>",
            infoFiltered: "<?php echo e(__('(filtered from _MAX_ total entries)')); ?>",
            search: "<?php echo e(__('Search:')); ?>",
            thousands: ",",
            loadingRecords: "<?php echo e(__('Loading...')); ?>",
            processing: "<?php echo e(__('Processing...')); ?>"
        }
    </script>
      <script type="text/javascript">
        $(".filter").click(function() {
            $("#show_filter").toggleClass('display-none');
        });
    </script>
    <script>

        $(document).ready(function() {
            var table = $("#selection-datatable1").DataTable({
                order: [],
                select: {
                    style: "multi"
                },
                "language": dataTableLang,
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
            $(document).on("click", ".btn-filter", function() {
                getData();
            });

            function getData() {
                table.clear().draw();
                $("#selection-datatable1 tbody tr").html(
                    '<td colspan="11" class="text-center"> Loading ...</td>');

                var data = {
                    status: $("#status").val(),
                    start_date: $("#start_date").val(),
                    end_date: $("#end_date").val(),
                    all_users: $("#all_users").val(),
                };
                $.ajax({
                    url: '<?php echo e(route('projects.ajax')); ?>',
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        table.rows.add(data.data).draw(true);
                    },
                    error: function(data) {
                        toastrs('Info', data.error, 'error')
                    }
                })
            }

            getData();

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Taskly/Resources/views/project_report/index.blade.php ENDPATH**/ ?>