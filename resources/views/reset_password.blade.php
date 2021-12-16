<head>
    <link  rel="stylesheet" href="{{asset('css/css.css')}}" />
</head>
Система сброса пароля
<br>
@if ($errors->any())
    @foreach ($errors->all() as $message)
        <p class="error" style="color:red;margin-bottom:10px">
            {{$message}}
        </p>
    @endforeach
@endif
@if (session('confirmPasswordError'))
    <p class="success" id="reserv_success_msg">{{session('confirmPasswordError')}}</p>
@endif
<form method='POST' action="{{route('get_code')}}">
    @csrf
    @method('PUT')
    <h1>Сброс пароля</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="email" id="email" placeholder="email"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Получить код</button>
</form>

@if($showCodeForm ?? '')
    <form method='GET' action="{{route('send_code')}}">
        @csrf

        <h1>Введите код</h1>
        <ul>
            <li class="li"><label>
                    <input class="input" type="text" name="code" id="code" placeholder="code"/>
                </label></li>
        </ul>
        <button class="button" type="submit">Сбросить пароль</button>
    </form>
@endif
@if($showNewPasswordForm ?? '')
    <form method='POST' action="{{route('send_new_password')}}">
        @csrf
        <h1>Введите новый пароль</h1>
        <ul>
            <li class="li"><label>
                    <input class="input" type="text" name="password" id="password" placeholder="new password"/>
                </label></li>
            <li class="li"><label>
                    <input class="input" type="text" name="confirmPassword" id="confirmPassword" placeholder="confirm new password"/>
                </label></li>
        </ul>
        <button class="button" type="submit">Задать новый пароль и авторизоваться</button>
    </form>
@endif
