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
        return view('history_form');
    }



    public function sendIdAndGetHistory(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|numeric|exists:passes,id',
        ], [

            'id.required' => 'Необходимо указать номер карты',
            'id.numeric' => 'Номер карты не может быть текстом',

            'id.exists'=> 'Данного значения нет в базе данных'

        ]);

        $idInformation = Pass::query()
            ->where('id', '=', \request()->get('id'))
            ->with('numbers', 'numbers.employees')
            ->get(); //беру коллекцию элементов, исходя из данных запроса


        return view('history_form', [
                'idInforms' => $idInformation
            ]
        );

    }


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
        if ($fullNameInformation->count() == 0) {
            return redirect('/showHistoryForm')->with('status_of_full_name', 'Данный пользователь не найден в базе данных');
        }

        return view('history_form', [
                'fullNameInforms' => $fullNameInformation
            ]
        );
    }


    public function sendNumberOfPass(Request $request)
    {

        $this->validate($request, [
            'pass_number' => 'required',
        ], [
            'pass_number.required' => 'Необходимо номер пропуска',
            'pass_number.numeric' => 'Номер карты не может быть текстом'
        ]);
        $passNumberInformation = PassNumber::query()
            ->where('card_number', '=', \request()->get('pass_number'))
            ->with('employees')
            ->get();


        if ($passNumberInformation->count() == 0) {
            return redirect('/showHistoryForm')->with('status_of_number', 'Данный номер пропуска не найден в базе данных');
        }

        return view('history_form', [
            'passNumbersInforms' => $passNumberInformation
        ]);

    }
}

