<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use App\Models\PassNumber;
use App\Models\Employee;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function showHistoryForm()
    {

        return view('show_history');

    }

    public function showHistoryFormTest()
    {

        return view('show_history',

            [
                'dataBasedPassIds' => $this->getDataBasedPassId(),
                'dataBasedPassNumbers' => $this->getDataBasedPassNumber()
            ]);

    }

//get PassNumber collection
    public function getDataBasedPassId()
    {

        return Pass::query()->where('id', '=', \request()->get('pass_id'))
            ->with('employees')
            ->with('numbers')
            ->get();

    }

    public function getDataBasedPassNumber()
    {
        return PassNumber::query()->where('card_number', '=', \request()->get('card_number'))
            ->with('employees')
            ->get();
    }


}
