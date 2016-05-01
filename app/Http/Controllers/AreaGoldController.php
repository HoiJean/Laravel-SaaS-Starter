<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AreaGoldController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('gold');
  }

  public function index()
  {
      return view('pages/dashboard/gold/index');
  }
}
