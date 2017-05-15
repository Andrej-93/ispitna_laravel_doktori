@extends('layout')
@section('content')
    <div class="row col-md-8">
        <h3>Листа на достапни доктори:</h3>
        <br>
        <ul class="list-group">
            @foreach($doctors as $doctor)
                @if($doctor->is_active == 1)
                    <li class="list-group-item"><a href="{{route('doctors.show', $doctor->id)}}"><p>Лекар:
                                д-р. {{ $doctor->name }}
                                - {{ $doctor->speciality }} - {{ $doctor->institution }}.</p>
                        </a>

                        <form method="POST" action="{{ route('doctors.destroy', $doctor->id) }}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Измени</a>
                            <button type="submit"
                               onclick="return confirm('Дали сте сигурни дека сакате да го избришете докторот од листата?')"
                               class="btn btn-danger">Избриши</button>
                        </form>
                    </li>
                @endif
            @endforeach
        </ul>
        <br>
        <a href="{{ route('doctors.create') }}" class="btn btn-primary">Внеси нов доктор</a>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Закажи нов преглед</a>
    </div>
@stop