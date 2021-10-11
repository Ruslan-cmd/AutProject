@extends('layout')
@section('show_history')
    <!DOCTYPE html>
<head>
    <link  rel="stylesheet" href="{{asset('css/css.css')}}" />
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
@if (session('Contact_status'))
    <p class="success" id="reserv_success_msg">{{session('Contact_status')}}</p>
@endif
@if (session('Repeat_message'))
    <p class="success" id="reserv_success_msg">{{session('Repeat_message')}}</p>
@endif
<form  method='POST' action="{{route('show_history')}}" >
    {{ csrf_field() }}
    <h1>Форма получения истории пропуска</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="pass_id" id="pass_id" placeholder="ID пропуска"/>
            </label></li>
        <li class="li"><label>
                <input class="input"  type="text" name="name" id="name" placeholder="Номер пропуска"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="card_number" id="card_number" placeholder="ФИО"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="system_number" id="system_number" placeholder="Дата"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="system_number" id="system_number" placeholder="Статус пропуска"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>
@endsection
