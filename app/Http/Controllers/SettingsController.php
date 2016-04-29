<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class SettingsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Get the user
      $user = Auth::user();

      return view('pages/settings/index')
        ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserContactInfo(Request $request)
    {
      // Get the user
      $user = Auth::user();

      if ($user->email != $request->get('email'))
      {
        $this->validate($request, [
          'name' => 'required|min:2|max:255',
          'email' => 'required|email|max:255|unique:users'
        ]);
      }
      else{
        $this->validate($request, [
          'name' => 'required|min:2|max:255',
          'email' => 'required|email|max:255'
        ]);
      }


      $user->name = $request->get('name');
      $user->email = $request->get('email');

      $user->save();

      // Mail the user and update message
      Mail::send('emails.settings.settings_update_contact', ['user' => $user], function ($m) use ($user) {
           $m->from('hello@app.com', 'Your Application');

           $m->to($user->email, $user->name)->subject('Your contact information has been updated');
       });


      // return to settings with flash message
      return redirect()
        ->route('settings')
        ->with('flash_success', 'Your contact information has been successfully updated.');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }
    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }



    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
