{{Form::open(array('url'=>'driver','method'=>'post','enctype'=>'multipart/form-data'))}}
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('name',__('Name'),['class'=>'form-label']) }}
                {{Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Driver Name'),'required'=>'required'))}}
                @error('name')
                <small class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('email',__('Email'),['class'=>'form-label']) }}
                {{Form::email('email',null,array('class'=>'form-control','placeholder'=>__('Enter Driver email'),'required'=>'required'))}}
                @error('email')
                <small class="invalid-email" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('phone',__('Mobile Number'),['class'=>'form-label'])}}
                {{Form::text('phone',null, array('class'=>'form-control','placeholder'=>__('Enter Driver Number'),'required'=>'required'))}}
                @error('phone')
                    <small class="invalid-phone" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('dob', __('Date of Birth'), ['class' => 'form-label']) !!}
                {{ Form::date('dob', null, ['class' => 'form-control current_date', 'required' => 'required', 'autocomplete' => 'off', 'placeholder' => 'Select Date of Birth']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('join_date', __('Join Date'), ['class' => 'form-label']) !!}
                {{ Form::date('join_date', null, ['class' => 'form-control current_date', 'required' => 'required', 'autocomplete' => 'off', 'placeholder' => 'Select join date']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('lincese_number',__('Lincese Number'),['class'=>'form-label'])}}
                {{Form::text('lincese_number',null, array('class'=>'form-control','placeholder'=>__('Enter Lincese Number'),'required'=>'required'))}}
                @error('lincese_number')
                    <small class="invalid-lincese_number" role="alert">
                        <strong class="text-danger">{{ $message }}</strong>
                    </small>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('lincese_type', __('Lincese Type'),['class'=>'form-label']) }}
                {{ Form::select('lincese_type', $lincese_type, null, array('class' => 'form-control','required'=>'required')) }}
                @if(count($lincese_type) <= 0)
                    <div class="text-muted text-xs">
                        {{__('Please create new lincese type')}} <a href="{{route('license.index')}}">{{__('here')}}</a>.
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('expiry_date', __('Lincese Expire Date'), ['class' => 'form-label']) !!}
                {{ Form::date('expiry_date', null, ['class' => 'form-control current_date', 'required' => 'required', 'autocomplete' => 'off', 'placeholder' => 'Select Issue Date']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('leave_status', __('Driver Status'),['class'=>'form-label']) }}
                {{ Form::select('leave_status', ['Active','Inactive'], null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Driver Status')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Working_time', __('Working Time'), ['class' => 'form-label']) !!}
                {{ Form::text('Working_time', null, ['class' => 'form-control current_date', 'required' => 'required', 'placeholder' => '10:00AM - 6:00PM']) }}
            </div>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('address', __('Address'), ['class' => 'form-label']) !!}
            {!! Form::text('address', null, array('class'=>'form-control','placeholder'=>__('Enter Driver Address'),'required'=>'required','rows'=>3))!!}
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
    <input type="button" value="{{__('Cancel')}}" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Create')}}" class="btn btn-primary">
</div>

{{Form::close()}}

<script>
    document.getElementById('files').onchange = function () {
    var src = URL.createObjectURL(this.files[0])
    document.getElementById('image').src = src
    }
</script>
