<?php echo e(Form::model($fuelType,array('route' => array('fuelType.update', $fuelType->id), 'method' => 'PUT'))); ?>


<div class="modal-body">
    <div class="row">
        <div class="form-group col-12">
            <?php echo e(Form::label('name', __('Fuel Type Name'),['class'=>'col-form-label'])); ?>

            <?php echo e(Form::text('name', null, array('class' => 'form-control','placeholder'=> 'Enter fuelType name' ,'required'=>'required'))); ?>

        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn  btn-primary">
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/FuelType/edit.blade.php ENDPATH**/ ?>