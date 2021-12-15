<head>
    <link rel="stylesheet" href="{{asset('css/css.css')}}"/>
</head>
Регистрация в системе
@if ($errors->any())
    @foreach ($errors->all() as $message)
        <p class="error" style="color:red;margin-bottom:10px">
            {{$message}}
        </p>
    @endforeach
@endif
<form method='POST' action="{{route('register')}}">
    @csrf
    <h1>Регистрация</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="name" id="name" placeholder="name"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="email" id="email" placeholder="email"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="password" id="password" placeholder="password"/>
            </label></li>
        <div>
            <a href="{{route('show_login_form')}}" accesskey="1" title="">Вход в систему</a>
        </div>
    </ul>
    <button class="button" type="submit">Зарегистрироваться</button>
</form>
