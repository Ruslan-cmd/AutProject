<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pass;
use App\Models\PassNumber;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    public function showHistoryForm()
    {
        return view('show_history_form');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendIdAndGetHistory(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|max:3|numeric',
        ], [
            'id.max' => 'Длина id карты максимум 3 символа',
            'id.required' => 'Необходимо указать номер карты',
            'id.numeric' => 'Номер карты не может быть текстом'
        ]);

        $idInformation = Pass::query()
            ->where('id', '=', \request()->get('id'))
            ->with('numbers', 'numbers.employees')
            ->get(); //беру коллекцию элементов, исходя из данных запроса


        return view('show_history_form', [
                'idInforms' => $idInformation
            ]
        );

    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendFullNameAndGetHistory(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
        ], [
            'full_name.required' => 'Необходимо указать имя пользователя',
        ]);

        $fullNameInformation = Employee::query()
            ->where('full_name', '=', \request()->get('full_name'))
            ->with('passNumbers', 'passNumbers.pass')
            ->get();


        return view('show_history_form', [
                'fullNameInforms' => $fullNameInformation
            ]
        );
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendNumberOfPass(Request $request)
    {

        $this->validate($request, [
            'pass_number' => 'required',
        ], [
            'pass_number.required' => 'Необходимо номер пропуска',
            'pass_number.numeric' => 'Номер карты не может быть текстом'
        ]);
        $passNumberInformation = PassNumber::query()
            ->where('card_number', '=', \request('pass_number'))
            ->with('employees')
            ->get();
        if ($passNumberInformation) {
            return view('show_history_form', [
                'passNumbersInforms' => $passNumberInformation
            ]);
        } else {
            return redirect('/showHistoryForm')->with('Contact_status', 'Данного номера пропуска нет в базе данных');
        }
    }
}

