

@extends('layouts.main')
@section('page-title')
    {{ __('Vehicle Calendar') }}
@endsection
@section('page-breadcrumb')
    {{ __('Vehicle Calendar') }}
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('Modules/Fleet/Resources/assets/css/main.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Calendar') }}</h5>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">{{ __('Bookings') }}</h4>
                    <ul class="event-cards list-group list-group-flush mt-3 w-100">

                        @foreach (json_decode($calenderDatas,true) as $calenderData)
                            @php
                                $month = date('m', strtotime($calenderData['start']));
                            @endphp
                            @if ($month == date('m'))
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-primary">
                                                    <i class="ti ti-calendar-event"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="m-0">
                                                        <a class="fc-daygrid-event"
                                                            style="white-space: inherit;">
                                                            <div class="fc-event-title-container">
                                                                
                                                                    <div class="fc-event-title text-dark">{{ $calenderData['notes'] }}
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </h6>
                                                    <small class="text-muted">{{ $calenderData['start'] }} to
                                                        {{ $calenderData['end'] }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script src="{{ asset('Modules/Fleet/Resources/assets/js/apexcharts.js') }}"></script>
<script>
    $(document).ready(function() {
        get_data();
    });

    function get_data() {
        $.ajax({
            success: function(data) {
                (function() {
                    "use strict";
                    var etitle;
                    var etype;
                    var etypeclass;
                    var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        buttonText: {
                            timeGridDay: "{{ __('Day') }}",
                            timeGridWeek: "{{ __('Week') }}",
                            dayGridMonth: "{{ __('Month') }}"
                        },
                        themeSystem: 'bootstrap',
                        navLinks: true,
                        droppable: true,
                        selectable: true,
                        selectMirror: true,
                        editable: true,
                        dayMaxEvents: true,
                        handleWindowResize: true,
                        events: {!! json_encode($arrEvents) !!},
                    });

                    calendar.render();

                })();
            }
        });
    }

    $(document).on('click', '.fc-daygrid-event', function(e) {
        "use strict";
        if ($(this).attr('href') != undefined) {
            if (!$(this).hasClass('deal')) {

                e.preventDefault();
                var event = $(this);
                var title = $(this).find('.fc-event-title-container .fc-event-title').html();

                var size = 'md';
                var url = $(this).attr('href');
                var parts = url.split("/");

                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $.ajax({
                    url: url,
                    success: function(data) {
                        console.log(data);
                        $('#commonModal .body').html(data);
                        $("#commonModal").modal('show');
                    },
                    error: function(data) {
                        data = data.responseJSON;
                        toastr('Error', data.error, 'error')
                    }
                });
            }
        }
    });
</script>
@endpush

