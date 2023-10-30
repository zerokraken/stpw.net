<div class="col-sm-12 col-lg-6 col-md-6">
    <div class="card">
        <div class="card-body p-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="theme-avtar ">
                        <img src="<?php echo e(get_module_img('Stripe')); ?>" alt="" class="img-user" style="max-width: 100%">
                    </div>
                    <div class="ms-3">
                        <label for="stripe-payment">
                            <h5 class="mb-0 text-capitalize pointer"><?php echo e(Module_Alias_Name('Stripe')); ?></h5>
                        </label>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input payment_method" name="payment_method" id="stripe-payment"
                        type="radio" data-payment-action="<?php echo e(route('plan.pay.with.stripe')); ?>">
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Stripe/Resources/views/payment/plan_payment.blade.php ENDPATH**/ ?>