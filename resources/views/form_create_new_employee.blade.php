@extends('layout')
@section('show_form_create_new_employee')
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
<form method='POST' action="{{route('create_employee')}}">
    @csrf
    @method('PUT')
    <h1>Устройство нового сотрудника</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="card_number" id="card_number" placeholder="Номер пропуска"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="full_name" id="full_name" placeholder="ФИО сотрудника"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>
@endsection
