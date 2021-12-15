<head>
    <link  rel="stylesheet" href="{{asset('css/css.css')}}" />
</head>
Система сброса пароля

@if(!($control ??  ''))
<br>
Пожалуйста, введите email зарегистрированного администратора. Он на данный email(если такой имеется) будет выслан код для сброса пароля:
@if ($errors->any())
    @foreach ($errors->all() as $message)
        <p class="error" style="color:red;margin-bottom:10px">
            {{$message}}
        </p>
    @endforeach
@endif
<form method='POST' action="{{route('get_code')}}">
    @csrf

    <h1>Сброс пароля</h1>
    <ul>
        <li class="li"><label>
                <input class="input" type="text" name="email" id="email" placeholder="email"/>
            </label></li>
    </ul>
    <button class="button" type="submit">Получить код</button>
</form>
@endif
@if($control ?? '')
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
