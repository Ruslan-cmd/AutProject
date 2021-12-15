@extends('layout')
@section('show_form_for_create_new_pass')
    <!DOCTYPE html>
<head>
    <link rel="stylesheet" href="{{asset('css/css.css')}}"/>
    <title></title>
</head>
<body>
@if ($errors->any())
    @foreach ($errors->all() as $message)
        <p class="error" style="color:red;margin-bottom:10px">
            {{$message}}
        </p>
    @endforeach
@endif
<form method='POST' action="{{route('create_new_pass')}}">
    @csrf
    @method('PUT')
    <h1>Создание нового пропуска</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="pass_id" id="pass_id" placeholder="ID пропуска"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="pass_number" id="pass_number" placeholder="номер пропуска"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="system_number" id="system_number"
                       placeholder="номер пропуска в системе"/>
            </label></li>

    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>
@endsection
