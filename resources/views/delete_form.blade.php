@extends('layout')
@section('show_delete_form')
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
@if (session('delete_status'))
    <p>{{session('delete_status')}}</p>
@endif
<form method='POST' action="{{route('delete_pass')}}">
    @csrf
    @method('PUT')
    <h1>Форма для удаления пропуска</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="pass_number" id="pass_number" placeholder="номер пропуска"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>
@endsection
