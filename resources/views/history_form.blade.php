@extends('layout')
@section('show_history')
    <!DOCTYPE html>
<head>
    <link rel="stylesheet" href="{{asset('css/css.css')}}"/>
    <title></title>
</head>
<body>
@if ($errors->any())
    {{$idInforms = NULL}}
    {{$fullNameInforms = NULL}}
    {{$passNumbersInforms = NULL}}
    @foreach ($errors->all() as $message)
        <p class="error" style="color:red;margin-bottom:10px">
            {{$message}}
        </p>
    @endforeach
@endif
@if (session('status_of_id'))
    <p class="success" id="reserv_success_msg">{{session('status_of_id')}}</p>
@endif
@if (session('status_of_full_name'))
    <p class="success" id="reserv_success_msg">{{session('status_of_full_name')}}</p>
@endif
@if (session('status_of_number'))
    <p class="success" id="reserv_success_msg">{{session('status_of_number')}}</p>
@endif
@if (session('register_message'))
    <p class="success" id="reserv_success_msg">{{session('register_message')}}</p>
@endif
<form method='GET' action="{{route('send_id')}}">
    @csrf
    <h1>Получение истории пропуска по его ID</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="id" id="id" placeholder="ID пропуска"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>

<form method='GET' action="{{route('send_number_of_pass')}}">
    @csrf
    <h1>Получение истории пропуска по номеру</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="pass_number" id="pass_number" placeholder="Номер карточки"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>

<form method='GET' action="{{route('send_full_name')}}">
    @csrf
    <h1>Получение истории пропуска по его владельцу</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="full_name" id="full_name" placeholder="ФИО"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Выполнить</button>
</form>

@if ($idInforms  ?? '')
    <table>
        <tr>
            <th colspan="2">ID пропуска</th>
            <th colspan="2">Номер карты</th>
            <th colspan="2">Дата создания пропуска после утери/регистрации в системе</th>
            <th colspan="2">Актуальность пропуска</th>
            <th colspan="2">Полное имя</th>
            <th colspan="2">Дата получения сотрудником пропуска</th>
            <th colspan="2">Дата увольнения сотрудника</th>

        </tr>
        @foreach($idInforms ?? ''  as $idInform)
            @foreach($idInform->numbers as $number)
                @foreach($number->employees as $employee)
                    <tr>
                        <td colspan="2">{{$number->pass_id}}</td>
                        <td colspan="2">{{$number->card_number}}</td>
                        <td colspan="2">{{$number->created_at}}</td>
                        <td colspan="2">{{$number->fired_at}}</td>
                        <td colspan="2">{{$employee->full_name}}</td>
                        <td colspan="2">{{$employee->created_at}}</td>
                        <td colspan="2">{{$employee->fired_at}}</td>
                    </tr>
                @endforeach
            @endforeach
        @endforeach
    </table>

@endif
@if ($fullNameInforms ?? '')
    <table>
        <tr>
            <th colspan="2">Полное имя</th>
            <th colspan="2">Дата получения сотрудником пропуска</th>
            <th colspan="2">Дата увольнения сотрудника</th>
            <th colspan="2">Номер карты</th>
            <th colspan="2">Дата создания пропуска после утери/регистрации в системе</th>
            <th colspan="2">Актуальность пропуска</th>
            <th colspan="2">Дата удаления пропуска</th>
            <th colspan="2">ID пропуска</th>


        </tr>
        @foreach($fullNameInforms ?? '' as $fullNameInform)
            @foreach($fullNameInform->passNumbers as $passNumber)

                    <tr>
                        <td colspan="2">{{$fullNameInform->full_name}}</td>
                        <td colspan="2">{{$fullNameInform->created_at}}</td>
                        <td colspan="2">{{$fullNameInform->fired_at}}</td>
                        <td colspan="2">{{$passNumber->card_number}}</td>
                        <td colspan="2">{{$passNumber->created_at}}</td>
                        <td colspan="2">{{$passNumber->is_active}}</td>
                        <td colspan="2">{{$passNumber->deleted_at}}</td>
                        <td colspan="2">{{$passNumber->pass_id}}</td>
                    </tr>

            @endforeach
        @endforeach
    </table>

@endif
@if ($passNumbersInforms ?? '')

    <table>
        <tr>
            <th colspan="2">Номер карты
            <th colspan="2">ID пропуска</th>
            <th colspan="2">Дата создания пропуска после утери/регистрации в системе</th>
            <th colspan="2">Актуальность пропуска</th>
            <th colspan="2">Дата удаления пропуска</th>
            <th colspan="2">Полное имя</th>
            <th colspan="2">Дата получения сотрудником пропуска</th>
            <th colspan="2">Дата увольнения сотрудника</th>
        </tr>
        @foreach($passNumbersInforms ?? '' as $passNumbersInform)
            @foreach($passNumbersInform->employees as $employee)

                <tr>
                    <td colspan="2">{{$passNumbersInform->card_number}}</td>
                    <td colspan="2">{{$passNumbersInform->pass_id}}</td>
                    <td colspan="2">{{$passNumbersInform->created_at}}</td>
                    <td colspan="2">{{$passNumbersInform->is_active}}</td>
                    <td colspan="2">{{$passNumbersInform->deleted_at}}</td>
                    <td colspan="2">{{$employee->full_name}}</td>
                    <td colspan="2">{{$employee->created_at}}</td>
                    <td colspan="2">{{$employee->deleted_at}}</td>
                </tr>
            @endforeach
        @endforeach

    </table>

@endif
@endsection
