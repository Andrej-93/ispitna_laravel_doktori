@extends('layout')
@section('content')
    <div class="row">
        <h3>Внеси податоци за нов доктор:</h3> <br>

        <form method="post" action="{{ route('doctors.update', $doctor->id) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group col-md-4">
                Име:
                <input type="text" name="name" value="@if(!old('name')){{ $doctor->name }}@endif{{ old('name') }}"
                       class="form-control"> <br>
                Специјализација:
                <input type="text" name="speciality"
                       value="@if(!old('speciality')){{ $doctor->speciality }}@endif{{ old('speciality') }}"
                       class="form-control"><br>
                Активен: <br>
                @if($doctor->is_active)
                    <input type="radio" name="is_active" checked value=1>Да
                    <input type="radio" name="is_active" value=0>Не<br> <br>
                @else
                    <input type="radio" name="is_active" value=1>Да
                    <input type="radio" name="is_active" checked value=0>Не<br> <br>
                @endif
                Институција:
                <input type="text" name="institution"
                       value="@if(!old('institution')){{ $doctor->institution }}@endif{{ old('institution') }}"
                       class="form-control"> <br>
                <button type="submit" class="btn btn-success">Измени податоци</button>
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
@stop