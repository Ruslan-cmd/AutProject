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

        // для пропусков, которые уже были когда либо с системе и имели id!
        // нет выборки на основе статуса is_active, начиная с первого удаленного\потерянного ТАК КАК не всегда система заполняет 100 процентов утерянных пропусков
        // нужен более тотальный контроль над тем, под какми id оздается пропуск
        $pass = Pass::query()->where('id', '=', \request()->get('pass_id'))->first(); //получение пропуска соответствующего введенному pass_id
        if ($pass) {
            $passNumber = new PassNumber();
            $passNumber->card_number = request('pass_number');
            $passNumber->system_number = request('system_number');
            $passNumber->is_active = true;
            $pass->numbers()->save($passNumber); //сохранение в базе данных информации о новом пропуске с учетом отношений между таблицами
            return redirect('/showFormForCreatingNewPass')->with('new_pass_message', 'Новый пропуск добавлен в систему');
            //проверка введеного id, он должен  новый следующим по счету, не более  - инкрементирую
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
            'pass_id' => 'required|max:3',
            'pass_number' => 'required',
            'system_number' => 'required',

        ], [
            'pass_id.max' => 'Длина номера карты максимум 3 символа',
            'pass_id.required' => 'Необходимо указать номер карты',
            'pass_number.required' => 'Необходимо указать номер карты',
            'system_number.required' => 'Необходимо указать номер карты в системе'
        ]);


    }
}
