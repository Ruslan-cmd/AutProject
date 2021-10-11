<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
  public function showHistory(){

      return view('show_history');

  }
}
