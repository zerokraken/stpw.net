
@extends('layouts.main')
@section('page-title')
    {{ __('Manage Vehicle Type') }}
@endsection
@section('page-breadcrumb')
{{ __('Manage Vehicle Type') }}
@endsection
@section('page-action')
<div>
    @can('vehicletype create')
    <a  class="btn btn-sm btn-primary" data-ajax-popup="true" data-size="md" data-title="{{ __('Create License') }}" data-url="{{route('vehicleType.create')}}" data-bs-toggle="tooltip"  data-bs-original-title="{{ __('Create') }}">
        <i class="ti ti-plus"></i>
    </a>
    @endcan
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('fleet::layouts.fleet_setup')
    </div>
    <div class="col-sm-9">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table mb-0 " >
                        <thead>
                            <tr>
                                    <th>{{__('VehicleType Name')}}</th>
                                @if (Gate::check('vehicletype edit') || Gate::check('vehicletype delete'))
                                    <th width="200px">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($VehicleTypes as $VehicleType)
                            <tr>
                                <td>{{ $VehicleType->name }}</td>
                                @if (Gate::check('vehicletype edit') || Gate::check('vehicletype delete'))
                                    <td class="Action">
                                        <span>
                                            @can('vehicletype edit')
                                            <div class="action-btn bg-info ms-2">
                                                <a  class="mx-3 btn btn-sm  align-items-center"
                                                    data-url="{{ route('vehicleType.edit', $VehicleType->id) }}"
                                                    data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip" title=""
                                                    data-title="{{ __('Edit Allowance Option') }}"
                                                    data-bs-original-title="{{ __('Edit') }}">
                                                    <i class="ti ti-pencil text-white"></i>
                                                </a>
                                            </div>
                                            @endcan
                                            @can('vehicletype delete')
                                            <div class="action-btn bg-danger ms-2">
                                                {{Form::open(array('route'=>array('vehicleType.destroy', $VehicleType->id),'class' => 'm-0'))}}
                                                @method('DELETE')
                                                    <a
                                                        class="mx-3 btn btn-sm  align-items-center bs-pass-para show_confirm"
                                                        data-bs-toggle="tooltip" title="" data-bs-original-title="Delete"
                                                        aria-label="Delete" data-confirm="{{__('Are You Sure?')}}" data-text="{{__('This action can not be undone. Do you want to continue?')}}"  data-confirm-yes="delete-form-{{$VehicleType->id}}"><i
                                                            class="ti ti-trash text-white text-white"></i></a>
                                                {{Form::close()}}
                                            </div>
                                            @endcan
                                        </span>
                                    </td>
                                @endif
                            </tr>
                            @empty
                            @include('layouts.nodatafound')
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

