<style>
    .pac-container {
        z-index: 9999 !important;
      }
</style>

{{Form::model($booking,array('route' => array('booking.update', $booking->id), 'method' => 'PUT')) }}

<div class="modal-body">
    <div class="row">
        @if(\Auth::user()->type != "client")
            <div class="form-group col-6">
                {{ Form::label('customer_name', __('Customer Name'),['class'=>'form-label']) }}
                {{ Form::select('customer_name',$customer , null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        @endif
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('vehicle_name', __('Vehicle Name'),['class'=>'form-label']) }}
                {{ Form::select('vehicle_name', $vehicle, null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('driver_name', __('Driver Name'),['class'=>'col-form-label']) }}
                {{ Form::select('driver_name', $Driver, null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
        <div class="form-group col-md-6  mb-1">
            <label for="datetime" class="col-form-label">{{ __('Start Date/Time') }}</label>
            <input class="form-control" placeholder="{{ __('Select Date/Time') }}"
                required="required" name="start_date" type="datetime-local"
                value="{{ isset($booking) ? date('Y-m-d\TH:i', strtotime($booking->start_date)) : '' }}">
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('start_address', __('Start Location'), ['class' => 'form-label']) !!}
            {{ Form::text('start_address', null, array('class' => 'form-control','id'=>"ship-address",'required'=>'required','autocomplete' => 'off')) }}
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('end_address', __('End Location'), ['class' => 'form-label']) !!}
            {{ Form::text('end_address', null, array('class' => 'form-control','id'=>"ship-addresses",'required'=>'required','autocomplete' => 'off')) }}
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('trip_type', __('Trip Type'),['class'=>'form-label']) }}
                {{ Form::select('trip_type', ['Single Trip'=>'Single Trip', 'Round Trip'=>'Round Trip'], null, array('class' => 'form-control','required'=>'required','placeholder'=> 'Select Trip Type')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('total_price', __('Total Price'),['class'=>'form-label']) }}
                {{ Form::number('total_price', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Total Amount')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('status', __('Status'),['class'=>'form-label']) }}
                {{ Form::select('status', ['Yet to start'=>'Yet to start','Completed'=>'Completed','OnGoing'=>'OnGoing','Cancelled'=>'Cancelled'], null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Trip Status')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('notes', __('Notes'),['class'=>'form-label']) }}
                {{ Form::text('notes', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Description')) }}
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn  btn-primary">
</div>

{{Form::close()}}


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



    // Create the autocomplete object, restricting the search predictions to
    // addresses in the US and Canada.
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

    for (const component of place.address_components) {
    // @ts-ignore remove once typings fixed
    const componentType = component.types[0];


    }
    location_data = address1Field.value;
    addaddress(location_data);

    }
    window.initAutocomplete = initAutocomplete;

</script>
