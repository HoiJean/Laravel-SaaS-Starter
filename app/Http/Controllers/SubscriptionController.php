<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;

class SubscriptionController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();

    }

    public function index(){
      return view('pages/settings/subscription/index')
        ->with('user', $this->user);
    }
}
