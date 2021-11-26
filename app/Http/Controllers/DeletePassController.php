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
                foreach ($passNumber->employees as $employee){
                    dd($employee->pivot);
                }

            foreach ($passNumber->employees as $employee) {
               $passNumber->employees()->updateExistingPivot($employee, [
                    'deleted_at' => now()
               ]);
             }
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
