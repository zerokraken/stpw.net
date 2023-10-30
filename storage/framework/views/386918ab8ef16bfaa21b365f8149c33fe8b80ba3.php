<style>
    .pac-container {
        z-index: 9999 !important;
      }
</style>
<?php echo e(Form::open(array('url'=>'booking','method'=>'post'))); ?>

<div class="modal-body">
    <div class="row">
        <?php if(\Auth::user()->type != "customer"): ?>
            <div class="form-group col-6">
                <?php echo e(Form::label('customer_name', __('Customer Name'),['class'=>'form-label'])); ?>

                <?php echo e(Form::select('customer_name',$customer , '', array('class' => 'form-control','required'=>'required'))); ?>

            </div>
        <?php endif; ?>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('vehicle_name', __('Vehicle Name'),['class'=>'form-label'])); ?>

                <?php echo e(Form::select('vehicle_name', $vehicle, null, array('class' => 'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('driver_name', __('Driver Name'),['class'=>'col-form-label'])); ?>

                <?php echo e(Form::select('driver_name', $Driver, null, array('class' => 'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="form-group col-md-6  mb-1">
            <label for="datetime" class="col-form-label"><?php echo e(__('Start Date/Time')); ?></label>
            <input class="form-control" value="<?php echo e(date('Y-m-d h:i')); ?>" placeholder="<?php echo e(__('Select Date/Time')); ?>"
                required="required" name="start_date" type="datetime-local">
        </div>
        <div class="form-group col-md-6">
            <?php echo Form::label('start_address', __('Start Location'), ['class' => 'form-label']); ?>

            <input type="text" class="form-control" id="ship-address" name="start_address" required autocomplete="off">
        </div>

        <div class="form-group col-md-6">
            <?php echo Form::label('end_address', __('End Location'), ['class' => 'form-label']); ?>

            <input type="text" class="form-control" id="ship-addresses" name="end_address" required autocomplete="off">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('trip_type', __('Trip Type'),['class'=>'form-label'])); ?>

                <?php echo e(Form::select('trip_type',['Single Trip'=>'Single Trip', 'Round Trip'=>'Round Trip'], null, array('class' => 'form-control','required'=>'required','placeholder'=> 'Select Trip Type'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('total_price', __('Total Price'),['class'=>'form-label'])); ?>

                <?php echo e(Form::number('total_price', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Total Amount'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('status', __('Status'),['class'=>'form-label'])); ?>

                <?php echo e(Form::select('status', ['Yet to start'=>'Yet to start','Completed'=>'Completed','OnGoing'=>'OnGoing','Cancelled'=>'Cancelled'], null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Trip Status'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('notes', __('Notes'),['class'=>'form-label'])); ?>

                <?php echo e(Form::text('notes', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Description'))); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn btn-primary"><?php echo e(__('Create')); ?></button>
</div>

<?php echo e(Form::close()); ?>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWNRjUGjZy39rVYX95fiRaQzzG1vm55nI&callback=initAutocomplete&libraries=places&v=weekly" defer></script>
<script type="text/javascript">
    function addaddress(address){
        var html = `
        <div class="form-group col-md-12 adress_div">
            <textarea  class="form-control"  name="addresses[]"  readonly>${address}</textarea>
            <button type="button" class="btn btn-sm btn-danger delete_address">
                <i class="ti ti-trash text-white py-1"></i>
            </button>
        </div>

        `;

        $('#add_addresses').append(html);
    }

    $(document).on("click",".delete_address",function() {
            $(this).parent('.adress_div').remove();
        });

    let location_data = '';

    /**
    * @license
    * Copyright 2019 Google LLC. All Rights Reserved.
    * SPDX-License-Identifier: Apache-2.0
    */
    // This sample uses the Places Autocomplete widget to:
    // 1. Help the user select a place
    // 2. Retrieve the address components associated with that place
    // 3. Populate the form fields with those address components.
    // This sample requires the Places library, Maps JavaScript API.
    // Include the libraries=places parameter when you first load the API.
    // For example: <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    let autocomplete;


    function initAutocomplete() {
    address1Field = document.querySelector("#ship-address");
    address1Fields = document.querySelector("#ship-addresses");

    autocomplete = new google.maps.places.Autocomplete(address1Field, {
    componentRestrictions: { country: ["us", "ca", "in"] },
    fields: ["address_components", "geometry"],
    types: ["address"],
    });
    address1Field.focus();

    autocomplete = new google.maps.places.Autocomplete(address1Fields, {
    componentRestrictions: { country: ["us", "ca", "in"] },
    fields: ["address_components", "geometry"],
    types: ["address"],
    });
    address1Fields.focus();

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    autocomplete.addListener("place_changed", function() {
        fillInAddress();
        });
    }

    function fillInAddress() {
    // Get the place details from the autocomplete object.
    const place = autocomplete.getPlace();

    // which are documented at http://goo.gle/3l5i5Mr
    for (const component of place.address_components) {
    // @ts-ignore remove once typings fixed
    const componentType = component.types[0];


    }
    location_data = address1Field.value;
    addaddress(location_data);

    }
    window.initAutocomplete = initAutocomplete;

</script>

<script>
    var today = new Date();

    $("#due_date").flatpickr({

        dateFormat: "Y-m-d",

        "locale": {
            "firstDayOfWeek": 7
        },
        time_24hr: true,
        minDate: today,
        onChange: function (selectedDates, dateStr, instance) {
        },
    });

    $("#start_date").flatpickr({

        dateFormat: "Y-m-d",

        "locale": {
            "firstDayOfWeek": 7
        },
        time_24hr: true,
        minDate: today,
        onChange: function (selectedDates, dateStr, instance) {
        },
    });
</script>
<?php /**PATH /home/u886959491/domains/stpw.net/public_html/Modules/Fleet/Resources/views/booking/create.blade.php ENDPATH**/ ?>