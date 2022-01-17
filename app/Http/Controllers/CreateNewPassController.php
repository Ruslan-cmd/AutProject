<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use App\Models\PassNumber;
use Illuminate\Http\Request;

class CreateNewPassController extends Controller
{
    public function showFormForCreatingNewPass()
    {
        return view('form_for_new_pass');
    }

    public function createNewPass(Request $request)
    {
        $this->validationData($request);

        $pass = Pass::query()->where('id', '=', \request()->get('pass_id'))->first(); //получение пропуска соответствующего введенному pass_id
        // exists pass
        if ($pass) {
            $passNumber = new PassNumber();
            $passNumber->card_number = request('pass_number');
            $passNumber->system_number = request('system_number');
            $passNumber->is_active = true;
            $pass->numbers()->save($passNumber);
            return redirect('/showFormForCreatingNewPass')->with('new_pass_message', 'Новый пропуск добавлен в систему');
            // new pass
        } elseif ((\request()->get('pass_id')) == ((Pass::query()->pluck('id')->last()) + 1)) {
            $pass = new Pass(); //создание нового уникального id
            $pass->save();
            $passNumber = new PassNumber();
            $passNumber->card_number = request('pass_number');
            $passNumber->system_number = request('system_number');
            $passNumber->is_active = true;
            $pass->numbers()->save($passNumber);
            return redirect('/showFormForCreatingNewPass')->with('new_pass_message', 'Новый пропуск добавлен в систему');
        }
        return redirect('/showFormForCreatingNewPass')->with('new_pass_error_message', 'Введены некорректные данные, данного pass_id не существует');
    }

    public function validationData(Request $request)
    {


        $this->validate($request, [
            'pass_id' => 'required|numeric ',
            'pass_number' => 'required|numeric',
            'system_number' => 'required|numeric',

        ], [
            'pass_id.required' => 'Ошибка: необходимо указать номер карты',
            'pass_id.numeric' => ' Ошибка: ID не может содержать буквы',
            'pass_number.required' => 'Ошибка: необходимо указать номер карты',
            'pass_number.numeric' => ' Ошибка: номер пропуска не может содержать буквы',
            'system_number.required' => 'Ошибка: необходимо указать номер карты в системе',
            'system_number.numeric' => ' Ошибка: номер пропуска в системе не может содержать буквы',
        ]);


    }
}
