@extends('layout')
@section('content')
    <div class="row col-md-6">
        <h3>Податоци за прегледот:</h3>
        <ul class="list-group">
            <li class="list-group-item">
                Име на пациентот:
                {{ $appointment->patient_name }}
            </li>
            <li class="list-group-item">
                Датум и време на прегледот:
                {{ $appointment->time_from }} - {{ Carbon\Carbon::parse($appointment->time_to)->format('H:i:s') }}
            </li>
            <li class="list-group-item">
                Дали е одржан прегледот:
                @if($appointment->has_occured)
                    ДА
                @else
                    НЕ
                @endif
            </li>
        </ul>
        <form method="POST" action="{{ route('appointments.destroy', $appointment->id) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Измени</a>
            <button type="submit"
                    onclick="return confirm('Дали сте сигурни дека сакате да го избришете прегледот?')"
                    class="btn btn-danger">Избриши</button>
        </form>
    </div>
@stop