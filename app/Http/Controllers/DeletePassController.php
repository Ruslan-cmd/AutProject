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
            // last employee-pass connect
            $createdAt = NULL;
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

        return redirect('/showFormDeletePass')->with('delete_status', 'Пропуск удален');

    }

    public function validationData(Request $request)
    {
        $this->validate($request, [
            'pass_number' => 'required|numeric|exists:pass_numbers,card_number',

        ], [
            'pass_number.required' => 'Ошибка: необходимо указать номер карты',
            'pass_number.exists' => 'Ошибка: данного пропуска нет в базе данных',
            'pass_number.numeric' => 'Ошибка: номер пропуска не может сожержать буквы'
        ]);
    }
}
