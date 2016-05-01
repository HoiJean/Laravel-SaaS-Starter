<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AreaStandardController extends Controller
{
  public function __construct()
  {
    $this->middleware('standard');
  }

  public function index()
  {
      return view('pages/dashboard/standard/index');
  }
}
