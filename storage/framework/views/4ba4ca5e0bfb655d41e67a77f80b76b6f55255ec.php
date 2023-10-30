<?php echo e(Form::open(array('url' => 'fleet_customer'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-12">
            <?php echo e(Form::label('name', __('Customer Name'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::text('name', '', array('class' => 'form-control','placeholder'=> 'Enter customer name' ,'required'=>'required'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <?php echo e(Form::label('email', __('Email'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::email('email', '', array('class' => 'form-control','placeholder'=> 'Enter Customer Email' ,'required'=>'required'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <?php echo e(Form::label('phone', __('Mobile Number'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::text('phone', '', array('class' => 'form-control','placeholder'=> 'Enter Customer Number' ,'required'=>'required'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            <?php echo e(Form::label('address', __('Address'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::textarea('address', '', array('class' => 'form-control','placeholder'=> 'Enter address' ,'required'=>'required','rows'=>3))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/customer/create.blade.php ENDPATH**/ ?>