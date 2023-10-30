
@if(!empty($customer))
{{Form::model($customer,array('route' => array('fleet_customer.update', $customer->id), 'method' => 'PUT')) }}
@else
    {{ Form::open(['route' => ['fleet_customer.store'], 'method' => 'post']) }}
@endif
@if(!empty($user->id))
<input type="hidden" name="user_id" value="{{ $user->id}}">
@endif

<div class="modal-body">
    <div class="row">
        <div class="form-group col-12">
            {{ Form::label('name', __('Customer Name'),['class'=>'col-form-label']) }}
            {{Form::text('name',!empty($customer)? $customer->name : $user->name,array('class'=>'form-control','required'=>'required'))}}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            {{ Form::label('phone', __('Mobile Number'),['class'=>'col-form-label']) }}
            {{ Form::number('phone', null , array('class' => 'form-control','placeholder'=> 'Enter Customer Number' ,'required'=>'required')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-12">
            {{ Form::label('address', __('Address'),['class'=>'col-form-label']) }}
            {{ Form::textarea('address', null , array('class' => 'form-control','placeholder'=> 'Enter Customer Address' ,'required'=>'required','rows'=>3)) }}
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn  btn-primary">
</div>

