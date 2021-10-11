<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
</head>
<body>
<div>
    <div id="header" class="container">
        <div id="menu">
            <ul>
                <li class="main-title"><a href="{{route('show_history')}}" accesskey="1" title="">Форма для просмотра истории пропусков</a></li>
                <li class="main-title"><a href="{{route('view')}}" accesskey="2" title="">Форма изменения статуса пропуска после утери</a></li>
                <li class="main-title"><a href="{{route('view')}}" accesskey="2" title="">Форма для заведения данных на нового сотрудника по существующим пропускам </a></li>
                <li class="main-title"><a href="{{route('view')}}" accesskey="2" title="">Форма для добавления в базу данных новых пропусков</a></li>
            </ul>
        </div>
    </div>
</div>
@yield('show_history')
</body>

