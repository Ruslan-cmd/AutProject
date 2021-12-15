<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link  rel="stylesheet" href="{{asset('css/css.css')}}" />

</head>
<body>
<div>
    <div id="header" class="container">
        <div id="menu">
            <ul class="rectangle">
                <li class="main-title"><a href="{{route('show_history_form')}}" accesskey="1" title="">Просмотр истории</a></li>
                <li class="main-title"><a href="{{route('show_form_for_create_new_pass')}}" accesskey="2" title="">Создание нового пропуска в системе</a></li>
                <li class="main-title"><a href="{{route('show_delete_form')}}" accesskey="2" title="">Удаление пропуска (утеря, поломка)</a></li>
                <li class="main-title"><a href="{{route('show_form_fired_employee')}}" accesskey="2" title="">Увольнение сотрудника</a></li>
                <li class="main-title"><a href="{{route('show_form_create_new_employee')}}" accesskey="2" title="">Устройство нового сотрудника</a></li>
            </ul>
        </div>
    </div>
</div>
<div>
    <a href="{{route('show_register_form')}}" accesskey="1" title="">Регистрация нового системного администратора</a>
</div>
@yield('show_history')
@yield('show_form_for_create_new_pass')
@yield('show_delete_form')
@yield('show_form_fired_employee')
@yield('show_form_create_new_employee')
</body>

