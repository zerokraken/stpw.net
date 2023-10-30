<?php echo e(Form::open(array('url' => 'fuelType'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-12">
            <?php echo e(Form::label('name', __('Fuel Type Name'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::text('name', '', array('class' => 'form-control','placeholder'=> 'Enter Fuel Type Name' ,'required'=>'required'))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/FuelType/create.blade.php ENDPATH**/ ?>