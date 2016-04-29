<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected function sendMail($user, $subject, $view){
      Mail::send( $view , ['user' => $user], function ($m) use ($user, $subject) {
           $m->from('hello@app.com', 'Your Application');

           $m->to($user->email, $user->name)->subject($subject);
       });
    }

}
