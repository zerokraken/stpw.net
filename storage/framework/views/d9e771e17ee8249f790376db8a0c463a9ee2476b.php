<?php echo e(Form::open(array('url'=>'driver','method'=>'post','enctype'=>'multipart/form-data'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?>

                <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Driver Name'),'required'=>'required'))); ?>

                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('email',__('Email'),['class'=>'form-label'])); ?>

                <?php echo e(Form::email('email',null,array('class'=>'form-control','placeholder'=>__('Enter Driver email'),'required'=>'required'))); ?>

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="invalid-email" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('phone',__('Mobile Number'),['class'=>'form-label'])); ?>

                <?php echo e(Form::text('phone',null, array('class'=>'form-control','placeholder'=>__('Enter Driver Number'),'required'=>'required'))); ?>

                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="invalid-phone" role="alert">
                        <strong class="text-danger"><?php echo e($message); ?></strong>
                    </small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo Form::label('dob', __('Date of Birth'), ['class' => 'form-label']); ?>

                <?php echo e(Form::date('dob', null, ['class' => 'form-control current_date', 'required' => 'required', 'autocomplete' => 'off', 'placeholder' => 'Select Date of Birth'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo Form::label('join_date', __('Join Date'), ['class' => 'form-label']); ?>

                <?php echo e(Form::date('join_date', null, ['class' => 'form-control current_date', 'required' => 'required', 'autocomplete' => 'off', 'placeholder' => 'Select join date'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('lincese_number',__('Lincese Number'),['class'=>'form-label'])); ?>

                <?php echo e(Form::text('lincese_number',null, array('class'=>'form-control','placeholder'=>__('Enter Lincese Number'),'required'=>'required'))); ?>

                <?php $__errorArgs = ['lincese_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="invalid-lincese_number" role="alert">
                        <strong class="text-danger"><?php echo e($message); ?></strong>
                    </small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('lincese_type', __('Lincese Type'),['class'=>'form-label'])); ?>

                <?php echo e(Form::select('lincese_type', $lincese_type, null, array('class' => 'form-control','required'=>'required'))); ?>

                <?php if(count($lincese_type) <= 0): ?>
                    <div class="text-muted text-xs">
                        <?php echo e(__('Please create new lincese type')); ?> <a href="<?php echo e(route('license.index')); ?>"><?php echo e(__('here')); ?></a>.
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo Form::label('expiry_date', __('Lincese Expire Date'), ['class' => 'form-label']); ?>

                <?php echo e(Form::date('expiry_date', null, ['class' => 'form-control current_date', 'required' => 'required', 'autocomplete' => 'off', 'placeholder' => 'Select Issue Date'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('leave_status', __('Driver Status'),['class'=>'form-label'])); ?>

                <?php echo e(Form::select('leave_status', ['Active','Inactive'], null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Driver Status'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo Form::label('Working_time', __('Working Time'), ['class' => 'form-label']); ?>

                <?php echo e(Form::text('Working_time', null, ['class' => 'form-control current_date', 'required' => 'required', 'placeholder' => '10:00AM - 6:00PM'])); ?>

            </div>
        </div>
        <div class="form-group col-md-6">
            <?php echo Form::label('address', __('Address'), ['class' => 'form-label']); ?>

            <?php echo Form::text('address', null, array('class'=>'form-control','placeholder'=>__('Enter Driver Address'),'required'=>'required','rows'=>3)); ?>

        </div>
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <p class="upload_file"></p>
            <img id="image" class="mt-2" style="width:25%;"/>
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
</div>

<?php echo e(Form::close()); ?>


<script>
    document.getElementById('files').onchange = function () {
    var src = URL.createObjectURL(this.files[0])
    document.getElementById('image').src = src
    }
</script>
<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/driver/create.blade.php ENDPATH**/ ?>