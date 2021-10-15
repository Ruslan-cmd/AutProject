@extends('layout')
@section('show_history')
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
@if (session('Contact_status'))
    <p class="success" id="reserv_success_msg">{{session('Contact_status')}}</p>
@endif
@if (session('Repeat_message'))
    <p class="success" id="reserv_success_msg">{{session('Repeat_message')}}</p>
@endif
<form method='POST' action="{{route('show_history_send')}}">
    {{ csrf_field() }}
    <h1>Форма получения истории пропуска</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="pass_id" id="pass_id" placeholder="ID пропуска"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="card_number" id="card_number" placeholder="Номер пропуска"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="full_name" id="full_name" placeholder="ФИО"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="is_active" id="is_active" placeholder="Статус пропуска"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>
@if($dataBasedPassIds ?? '')
<table>
    <tr>
        <th colspan="2">ID пропуска</th>
        <th colspan="2">ФИО</th>
        <th colspan="2">Дата</th>
    </tr>
    @foreach($dataBasedPassIds ?? '' as $dataBasedPassId)
        @foreach($dataBasedPassId->employees as $employee)
            <tr>
                <td colspan="2">{{$dataBasedPassId->id}}</td>
                <td colspan="2">{{$employee->full_name}}</td>
                <td colspan="2">{{$employee->created_at}}</td>
            </tr>
            @endforeach
    @endforeach
</table>
<table>
    <tr>
        <th colspan="2">ID пропуска</th>
        <th colspan="2">Номер карты</th>
        <th colspan="2">Номер в системе</th>
        <th colspan="2">Статус</th>
        <th colspan="2">Дата</th>
    </tr>
    @foreach($dataBasedPassIds ?? '' as $dataBasedPassId)
        @foreach($dataBasedPassId->numbers as $number)
            <tr>
                <td colspan="2">{{$dataBasedPassId->id}}</td>
                <td colspan="2">{{$number->card_number}}</td>
                <td colspan="2">{{$number->system_number}}</td>
                <td colspan="2">{{$number->is_active}}</td>
                <td colspan="2">{{$number->created_at}}</td>
            </tr>
            @endforeach
        @endforeach
</table>
@endif
 @if($dataBasedPassNumbers ?? '')

     <table>
         <tr>
             <th colspan="2">Номер карты</th>
             <th colspan="2">ФИО</th>
         </tr>
         @foreach($dataBasedPassNumbers ?? '' as $dataBasedPassNumber)
             @foreach($dataBasedPassNumber->employees as $employee)
                 <tr>
                     <td colspan="2">{{$dataBasedPassNumber->card_number}}</td>
                     <td colspan="2">{{$employee->full_name}}</td>
                 </tr>
             @endforeach
         @endforeach
     </table>

     @endif
@endsection
