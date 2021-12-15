<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use App\Models\PasswordCode;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login_form');
    }

    public function showRegisterForm()
    {
        return view('registration_form');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(RegisterPostRequest $request)
    {
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(\request('password'));
        $user->save();
        auth('web')->login($user);
        return redirect('/showHistoryForm')->with('register_message','Вы зарегистрированы в системе');
    }

    public function login(LoginPostRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt($data)) {
            $comment = 'Обнаружен вход в систему,' . now();
            $toEmail = "progectruslan@gmail.com";
            Mail::to($toEmail)->send(new FeedbackMail($comment));
            return redirect('showHistoryForm');
        }

        return redirect('/showLoginForm')->withErrors([
            'email' => 'Пользователь не найден'
        ]);

    }

    public function resetPassword()
    {
        return view('reset_password');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function getCode(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ], [

            'email.required' => 'Необходимо указать email',
            'email.email' => 'Введите верный email',
            'email.exists' => 'Данного email нет в базе данных'

        ]);
        $random = random_int(1, 1000);
        $comment = 'Код для сброса пароля:' . $random;
        $toEmail = "progectruslan@gmail.com";
        Mail::to($toEmail)->send(new FeedbackMail($comment));
        $passwordCode = new PasswordCode();
        $passwordCode->code = $random;
        $passwordCode->save();
        return view('reset_password');

    }

    public function sendCode(Request $request)
    {
    if (PasswordCode::query()->where('code', '=', \request('code'))->first()){
return 'LOLOL';
    }
    }
}
