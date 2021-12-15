@extends('layout')
@section('show_form_fired_employee')
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
<form method='POST' action="{{route('fire_employee')}}">
    @csrf
    @method('PUT')
    <h1>Увольнение сотрудника</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="full_name" id="full_name" placeholder="ФИО пользователя"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>
@endsection
