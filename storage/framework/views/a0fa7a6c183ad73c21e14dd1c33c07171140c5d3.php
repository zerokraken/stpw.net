<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('paypal manage')): ?>
<a href="#paypal_sidenav" class="list-group-item list-group-item-action">
       <?php echo e(__('Paypal')); ?>

       <div class="float-end"><i class="ti ti-chevron-right"></i></div>
</a>
<?php endif; ?>
<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Paypal/Resources/views/setting/sidebar.blade.php ENDPATH**/ ?>