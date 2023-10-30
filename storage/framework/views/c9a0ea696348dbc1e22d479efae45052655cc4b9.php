<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Software Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- wrapper start -->
<div class="wrapper">

    <section class="dedicated-themes-section padding-bottom padding-top">
        <div class="container">
            <div class="section-title text-center section">
                <h1 style="font-size: 115px">404</h1>
                <div><?php echo e(__('Ooops!!! The Add on you are looking for is not found')); ?></div>
            </div>
        </div>
    </section>

    <section class="bg-white padding-top padding-bottom ">
        <div class="container">
            <div class="section-title text-center">
                <h2><?php echo e(__('Why Choose a Dedicated Fashion Theme ')); ?> <b><?php echo e(__('for Your Business?')); ?></b></h2>
                <p><?php echo e(__('With Alligō, you can take care of the entire partner lifecycle - from onboarding through nurturing, cooperating, and rewarding. Find top performers and let go of those who aren’t a good fit.')); ?>}</p>
            </div>
            <?php if(count($modules) > 0): ?>
                <div class="row product-row">
                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $path = $module->getPath() . '/module.json';
                            $json = json_decode(file_get_contents($path), true);
                        ?>
                        <?php if(!isset($json['display']) || $json['display'] == true): ?>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 product-card">
                            <div class="product-card-inner">
                                <div class="product-img">
                                    <a href="product.html">
                                        <img src="assets/images/Custom-Fields.png" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4> <a href="product.html"><?php echo e(Module_Alias_Name($module->getName())); ?></a> </h4>
                                    <div class="price">
                                        <ins><span class="currency-type"><?php echo e(super_currency_format_with_sym(ModulePriceByName($module->getName())['monthly_price'])); ?></span> <span class="time-lbl text-muted"><?php echo e(__('/Month')); ?></span></ins>
                                                    <ins><span class="currency-type"><?php echo e(super_currency_format_with_sym(ModulePriceByName($module->getName())['yearly_price'])); ?></span> <span class="time-lbl text-muted"><?php echo e(__('/Year')); ?></span></ins>
                                    </div>
                                    <a href="<?php echo e(route('software.details',Module_Alias_Name($module->getName()))); ?>" target="_new"  class="btn cart-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>
<!-- wrapper end -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('marketplace.marketplace', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u886959491/domains/stpw.net/public_html/resources/views/marketplace/detail_not_found.blade.php ENDPATH**/ ?>