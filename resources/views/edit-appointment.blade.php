@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Измени податоци за прегледот</h3><br>

            <form method="post" action="{{ route('appointments.update', $appointment->id) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

                <div class="form-group col-md-6">
                    Датум:
                    <input type="date" class="form-control" name="date"
                           value="@if(!old('date')){{ Carbon\Carbon::parse($appointment->time_from)->format('Y-m-d') }}@endif{{ old('date') }}">
                    Време од:
                    <input type="time" class="form-control" name="time_from"
                           value="@if(!old('time_from')){{ Carbon\Carbon::parse($appointment->time_from)->format('H:i:s') }}@endif{{ old('time_from') }}">
                    Време до:
                    <input type="time" class="form-control" name="time_to"
                           value="@if(!old('time_to')){{ Carbon\Carbon::parse($appointment->time_to)->format('H:i:s') }}@endif{{ old('time_to') }}">
                    Име на пациентот:
                    <input type="text" name="patient_name"
                           value="@if(!old('patient_name')){{ $appointment->patient_name }}@endif{{ old('patient_name') }}"
                           class="form-control">
                    Избери доктор:
                    <select name="doctor_id" class="form-control">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}"
                                    @if($appointment->doctor_id == $doctor->id) selected @endif> {{ $doctor->name }} </option>
                        @endforeach
                    </select>
                    Дали е одржан прегледот:<br>
                    <input type="radio" name="has_occured" value=1 @if($appointment->has_occured) checked @endif> ДА
                    <input type="radio" name="has_occured" value=0 @if(!$appointment->has_occured) checked @endif> НЕ
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success">Измени преглед</button>
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