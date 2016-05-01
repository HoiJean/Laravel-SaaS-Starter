<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AreaPremiumController extends Controller
{
  public function __construct()
  {
    $this->middleware('premium');
  }

  public function index()
  {
      return view('pages/dashboard/premium/index');
  }
}
