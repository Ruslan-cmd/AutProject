<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PassNumber;
use Illuminate\Http\Request;

class NewEmployeeController extends Controller
{
    public function showFormCreateNewEmployee()
    {
        return view('form_create_new_employee');
    }

    public function createEmployee(Request $request)
    {
        $this->validationData($request);
        $passNumber = PassNumber::query()->where('card_number', '=', \request('card_number'))
            ->with('employees')
            ->first();
        $id = $passNumber->id;
        $employee = new Employee();
        $employee->full_name = request('full_name');
        $employee->save();
        $employee->passNumbers()->attach($id);

    }

    public function validationData(Request $request)
    {


        $this->validate($request, [
            'card_number' => 'required|numeric|exists:pass_numbers,card_number',
            'full_name' => 'required',

        ], [
            'full_name.required' => 'Ошибка: необходимо указать ФИО сотрудника',
            'card_number.numeric' => 'Ошибка: поле не может содержать цифры',
            'card_number.exists' => 'Ошибка: номера пропуска нет в базе данных',
        ]);

    }
}
