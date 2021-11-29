<?php

namespace App\Http\Controllers;

use App\Models\PassNumber;
use Illuminate\Http\Request;

class DeletePassController extends Controller
{
    public function showDeleteForm()
    {
        return view('show_delete_form');

    }

    public function deletePass(Request $request)
    {
        $this->validationData($request);

        $passNumber = PassNumber::query()->where('card_number', '=', \request()->get('pass_number'))
            ->with('employees')
            ->first();

        if ($passNumber) {
            $passNumber->update([
                'is_active' => false,
                'deleted_at' => now()
            ]);
            $passNumber->save();

            // Нахожу сотрудника с самой свежей связью с пропуском и модифицирую его deleted_at
            $createdAt = NULL;
            $employeeWithLastDate = NULL;
            foreach ($passNumber->employees as $employee) {
                if ($employee->pivot->created_at > $createdAt) {
                    $employeeWithLastDate = $employee;
                }
            }
            $passNumber->employees()->updateExistingPivot($employeeWithLastDate, [
                'deleted_at' => now()
            ]);

        }
        return redirect('/showFormDeletePass')->with('Contact_status', 'Такого номера пропуска нет в системе, вы ошиблись');


    }

    public function validationData(Request $request)
    {


        $this->validate($request, [
            'pass_number' => 'required',

        ], [
            'pass_number.required' => 'Необходимо указать номер карты',
        ]);


    }
}
