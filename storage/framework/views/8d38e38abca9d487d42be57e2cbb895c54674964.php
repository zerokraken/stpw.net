<div class="card sticky-top" style="top:30px">
    <div class="list-group list-group-flush" id="useradd-sidenav">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('license manage')): ?>
            <a href="<?php echo e(route('license.index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e((request()->is('license*') ? 'active' : '')); ?>"><?php echo e(__('License')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehicletype manage')): ?>
            <a href="<?php echo e(route('vehicleType.index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e((request()->is('vehicleType*') ? 'active' : '')); ?>"><?php echo e(__('Vehicle Type')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fueltype manage')): ?>
            <a href="<?php echo e(route('fuelType.index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e((request()->is('fuelType*') ? 'active' : '')); ?>"><?php echo e(__('Fuel Type')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('recuerring manage')): ?>
            <a href="<?php echo e(route('recuerring.index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e((request()->is('recuerring*') ? 'active' : '')); ?>"><?php echo e(__('Recuerring')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('maintenanceType manage')): ?>
            <a href="<?php echo e(route('maintenanceType.index')); ?>" class="list-group-item list-group-item-action border-0 <?php echo e((request()->is('maintenanceType*') ? 'active' : '')); ?>"><?php echo e(__('Maintenance Type')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/layouts/fleet_setup.blade.php ENDPATH**/ ?>