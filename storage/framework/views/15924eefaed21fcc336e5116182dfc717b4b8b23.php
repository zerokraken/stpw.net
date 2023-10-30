<?php echo e(Form::open(array('url' => 'fuel'))); ?>

<div class="modal-body">
    <div class="row">
        <?php if(\Auth::user()->type != "driver"): ?>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo e(Form::label('driver_name', __('Driver Name'),['class'=>'col-form-label'])); ?>

                    <?php echo e(Form::select('driver_name', $driver, null, array('class' => 'form-control','required'=>'required'))); ?>

                </div>
            </div>
        <?php endif; ?>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('vehicle_name', __('Vehicle Name'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::select('vehicle_name', $vehicle, null, array('class' => 'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('fuel_type', __('Fuel Type'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::select('fuel_type', $fuelType, null, array('class' => 'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="form-group col-md-6  mb-1">
            <label for="datetime" class="col-form-label"><?php echo e(__('Fueling Date and Time')); ?></label>
            <input class="form-control" value="<?php echo e(date('Y-m-d h:i')); ?>" placeholder="<?php echo e(__('Select Fueling Date and Time')); ?>"
                required="required" name="fill_date" type="datetime-local">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('quantity', __('Gallons/Liters of Fuel'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::text('quantity', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Gallons/Liters of Fuel'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('cost', __('Cost per Gallon/Liter'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::number('cost', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Cost per Gallon/Liter'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('total_cost', __('Total Cost'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::number('total_cost', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Total Cost'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('odometer_reading', __('Odometer Reading'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::text('odometer_reading', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Odometer Reading'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('notes', __('Notes'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::textarea('notes', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Add Notes','rows'=>3))); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/fuel/create.blade.php ENDPATH**/ ?>