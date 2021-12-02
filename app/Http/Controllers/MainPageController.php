<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
  public function showMainPage(){
      return view('show_main_page');
  }
}
