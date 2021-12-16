<?php

namespace App\Http\Controllers;

use App\Models\PassNumber;
use Illuminate\Http\Request;

class DeletePassController extends Controller
{
    public function showDeleteForm()
    {
        return view('delete_form');

    }

    public function deletePass(Request $request)
    {
        $this->validationData($request);

        $passNumber = PassNumber::query()->where('card_number', '=', \request()->get('pass_number'))
            ->with('employees')
            ->first();
        //апгрейд статуса и даты удаления пропуска
        if ($passNumber) {
            $passNumber->update([
                'is_active' => false,
                'deleted_at' => now()
            ]);
            $passNumber->save();

            // Нахожу сотрудника с самой свежей связью с пропуском так как сотрудников на пропуске может быть множество и следовательно связей тоже и модифицирую его deleted_at
            $createdAt = NULL; // НУЛ для того, что вести начальное сравнение
            $employeeWithLastDate = NULL;
            foreach ($passNumber->employees as $employee) {
                if ($employee->pivot->created_at > $createdAt) {
                    $employeeWithLastDate = $employee;
                }
            }
            //апгрейд в промежуточной таблице
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
