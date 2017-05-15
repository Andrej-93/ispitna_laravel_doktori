@extends('layout')
@section('content')
    <div class="row">
        <h3>Внеси податоци за нов доктор:</h3> <br>

        <form method="post" action="{{ route('doctors.store') }}">
            {{ csrf_field() }}

            <div class="form-group col-md-4">
                Име:
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"> <br>
                Специјализација:
                <input type="text" name="speciality" value="{{ old('speciality') }}" class="form-control"><br>
                Активен: <br>
                <input type="radio" name="is_active" checked value=1>Да
                <input type="radio" name="is_active" value=0>Не<br> <br>
                Институција:
                <input type="text" name="institution" value="{{ old('institution') }}" class="form-control"> <br>
                <button type="submit" class="btn btn-success">Внеси доктор</button>
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