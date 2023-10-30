{{Form::model($maintenance,array('route' => array('maintenance.update', $maintenance->id), 'method' => 'PUT')) }}

<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">{{__('Service Type')}}</label>
                <div class="d-flex radio-check">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="form-check-input" id="maintenance" name="service_type" value="Maintenance" @if($maintenance->service_type=='Maintenance') checked @endif onclick="hide_show(this)">
                        <label class="form-label" for="maintenance">{{__('Maintenance')}}</label>
                    </div>
                    <div class="custom-control custom-radio ms-5 custom-control-inline">
                        <input type="radio" class="form-check-input" id="general" name="service_type" value="General" @if($maintenance->service_type=='General') checked @endif   onclick="hide_show(this)">
                        <label class="form-label" for="general">{{__('General')}}</label>
                    </div>
                </div>
            </div>
        </div>

        @if(\Auth::user()->type != "employee")
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('service_for', __('Service For'),['class'=>'col-form-label']) }}
                {{ Form::select('service_for', $employees, null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
        @endif
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('vehicle_name', __('Vehicle Name'),['class'=>'col-form-label']) }}
                {{ Form::select('vehicle_name', $vehicles, null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('maintenance_type', __('Maintenance Type'),['class'=>'col-form-label']) }}
                {{ Form::select('maintenance_type', $MaintenanceType, null, array('class' => 'form-control','required'=>'required')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('service_name', __('Maintenance Service Name'),['class'=>'col-form-label']) }}
                {{ Form::text('service_name', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Maintenance Service Name')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('charge', __('Cost'),['class'=>'col-form-label']) }}
                {{ Form::number('charge', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Cost')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('charge_bear_by', __('Charge Bear By'),['class'=>'col-form-label']) }}
                {{ Form::text('charge_bear_by', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Charge Bear By')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('maintenance_date', __('Maintenance Date'),['class'=>'col-form-label']) }}
                {{ Form::date('maintenance_date', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Service Date')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('priority', __('Priority'),['class'=>'col-form-label']) }}
                {{ Form::select('priority', ['High'=>'High','Medium'=>'Medium','Low'=>'Low'], null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Priority')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('total_cost', __('Total Cost'),['class'=>'col-form-label']) }}
                {{ Form::number('total_cost', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Total Cost')) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('notes', __('Notes'),['class'=>'col-form-label']) }}
                {{ Form::textarea('notes', null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Notes','rows'=>3)) }}
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn  btn-primary">
</div>

{{Form::close()}}
