<head>
    <link  rel="stylesheet" href="{{asset('css/css.css')}}" />
</head>
Добро пожаловать на площадку по работе с пропусками
<br>
Пожалуйста, войдите в систему:
@if ($errors->any())
    @foreach ($errors->all() as $message)
        <p class="error" style="color:red;margin-bottom:10px">
            {{$message}}
        </p>
    @endforeach
@endif
@if (session('sendCodeError'))
    <p class="success" id="reserv_success_msg">{{session('sendCodeError')}}</p>
@endif
<form method='POST' action="{{route('login')}}">
    @csrf
    <h1>Вход в систему</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="email" id="email" placeholder="email"/>
            </label></li>
        <li class="li"><label>
                <input class="input" type="text" name="password" id="password" placeholder="password"/>
            </label></li>
        <div>
            <a href="{{route('reset_password')}}" accesskey="1" title="">Сбросить пароль</a>
        </div>
    </ul>
    <button class="button" type="submit">Войти в систему</button>
</form>
