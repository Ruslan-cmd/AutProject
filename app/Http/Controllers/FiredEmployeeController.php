<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class FiredEmployeeController extends Controller
{
    public function showFormForFiredEmployee()
    {
        return view('show_form_for_fired_employee');
    }

    public function fireEmployee(Request $request)
    {
        $this->validationData($request);
        $employee = Employee::query()->where('full_name', '=', \request('full_name'))
            ->with('passNumbers')
            ->first();

        if ($employee) {
            $employee->update([
                'fired_at' => now(),
            ]);
            //поставить отметку deleted_at на текущем пропуске (самом новом)

        }
        return redirect('/showFormFiredEmployee')->with('Contact_status', 'Такого сотрудника нет в системе, вы ошиблись');

    }

    public function validationData(Request $request)
    {


        $this->validate($request, [
            'full_name' => 'required',

        ], [
            'full_name.required' => 'Необходимо указать ФИО сотрудника',
        ]);


    }
}
