<div class="card sticky-top" style="top:30px">
    <div class="list-group list-group-flush" id="useradd-sidenav">
        @can('license manage')
            <a href="{{route('license.index')}}" class="list-group-item list-group-item-action border-0 {{ (request()->is('license*') ? 'active' : '')}}">{{__('License')}} <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        @endcan

        @can('vehicletype manage')
            <a href="{{route('vehicleType.index')}}" class="list-group-item list-group-item-action border-0 {{ (request()->is('vehicleType*') ? 'active' : '')}}">{{__('Vehicle Type')}} <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        @endcan

        @can('fueltype manage')
            <a href="{{route('fuelType.index')}}" class="list-group-item list-group-item-action border-0 {{ (request()->is('fuelType*') ? 'active' : '')}}">{{__('Fuel Type')}} <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        @endcan

        @can('recuerring manage')
            <a href="{{route('recuerring.index')}}" class="list-group-item list-group-item-action border-0 {{ (request()->is('recuerring*') ? 'active' : '')}}">{{__('Recuerring')}} <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        @endcan

        @can('maintenanceType manage')
            <a href="{{route('maintenanceType.index')}}" class="list-group-item list-group-item-action border-0 {{ (request()->is('maintenanceType*') ? 'active' : '')}}">{{__('Maintenance Type')}} <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
        @endcan
    </div>
</div>
