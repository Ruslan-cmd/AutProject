<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('show_login_form');
    }

    public function showRegisterForm()
    {
        return view('show_registration_form');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $this->validationData($request);
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(\request('password'));
        $user->save();
        auth('web')->login($user);
        return redirect('/showHistoryForm');
    }

    public function validationData(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|numeric',

        ], [
            'name.required' => 'Укажите логин',
            'name.string' => 'Логин не должен содержать цифры',
            'email.required' => 'Необходимо указать email',
            'email.email' => 'Неверный формат',

            'password.required' => 'Необходимо указать пароль',
            'password.numeric' => 'Пароль должен состоять только из цифр'
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|numeric'
        ], [
                'email.required' => 'Необходимо указать email',
                'email.email' => 'Неверный формат',
                'email.unique' => 'Такой email уже есть в системе',
                'password.required' => 'Необходимо указать пароль',
                'password.numeric' => 'Пароль должен состоять только из цифр'
            ]
        );
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
}
