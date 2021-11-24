<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
</head>
<body>
<div>
    <div id="header" class="container">
        <div id="menu">
            <ul>
                <li class="main-title"><a href="{{route('show_history_form')}}" accesskey="1" title="">Форма для просмотра
                        истории пропусков</a></li>
                <li class="main-title"><a href="{{route('show_form_for_create_new_pass')}}" accesskey="2" title="">Форма для создания нового пропуска</a></li>
                <li class="main-title"><a href="#" accesskey="2" title="">Форма для удаления пропуска из системы в случае утери </a></li>
                <li class="main-title"><a href="#" accesskey="2" title="">Форма для добавления в базу данных новых
                        пропусков</a></li>
            </ul>
        </div>
    </div>
</div>
@yield('show_history')
@yield('show_form_for_create_new_pass')
</body>

