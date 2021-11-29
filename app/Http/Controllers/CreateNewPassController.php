<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use App\Models\PassNumber;
use Illuminate\Http\Request;

class CreateNewPassController extends Controller
{
    public function showFormForCreatingNewPass()
    {
        return view('show_form_for_new_pass');
    }

    public function createNewPass(Request $request)
    {
        $this->validationData($request);

        // для пропусков, которые уже были когда либо с системе и имели id!
        $pass = Pass::query()->where('id', '=', \request()->get('pass_id'))->first();
        if ($pass) {
            $passNumber = new PassNumber();
            $passNumber->card_number = request('pass_number');
            $passNumber->system_number = request('system_number');
            $passNumber->is_active = true;
            $pass->numbers()->save($passNumber);
        } elseif ((\request()->get('pass_id')) == ((Pass::query()->pluck('id')->last()) + 1)) {
            $pass = new Pass();
            $pass->save();
            $passNumber = new PassNumber();
            $passNumber->card_number = request('pass_number');
            $passNumber->system_number = request('system_number');
            $passNumber->is_active = true;
            $pass->numbers()->save($passNumber);
        } else return 'ERROR';
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
