@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>Приказ на агендата на доктор {{ $doctor->name }} за наредните 7 дена.</h3>
            <h4>Прегледи:</h4>
            @if(count($curr_appointments))
                <ul class="list-group">
                    @foreach($curr_appointments as $appointment )
                        @if ($appointment->has_occured == 0)
                            <li class="list-group-item"><a href="{{ route('appointments.show', $appointment->id) }}">Пациент: {{ $appointment->patient_name }} - Датум
                                и време: {{ $appointment->time_from }}
                                - {{ Carbon\Carbon::parse($appointment->time_to)->format('H:i:s') }}</a></li>
                        @endif
                    @endforeach
                </ul>
            @else
                <br> <h4>Нема закажани прегледи за наредните 7 дена.</h4>
            @endif
        <a class="btn btn-primary" href="{{ route('appointments.create') }}">Закажи нов преглед</a>
        </div>
    </div>
@stop