@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Нов преглед</h3><br>

            <form method="post" action="{{ route('appointments.store') }}">
                {{ csrf_field() }}
                <div class="form-group col-md-6">
                    Датум:
                    <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                    Време од:
                    <input type="time" class="form-control" name="time_from" value="{{ old('time_from') }}">
                    Време до:
                    <input type="time" class="form-control" name="time_to" value="{{ old('time_to') }}">
                    Име на пациентот:
                    <input type="text" name="patient_name" value="{{ old('patient_name') }}" class="form-control">
                    Избери доктор:
                    <select name="doctor_id" class="form-control">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                        @endforeach
                    </select>
                    Дали е одржан прегледот:<br>
                    <input type="radio" name="has_occured" value=1> ДА
                    <input type="radio" name="has_occured" value=0 checked> НЕ <br>
                    <br>
                    <button type="submit" class="btn btn-success">Внеси преглед</button>
                </div>
            </form>
            <div class="col-md-4">
                @if(count($errors))
                    <ul>
                        @foreach($errors->all() as $error)
                            <br>
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                @endif
            </div>
        </div>
    </div>
@stop