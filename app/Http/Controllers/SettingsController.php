<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class SettingsController extends Controller
{

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
    }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('pages/settings/index')
        ->with('user', $this->user);
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

      $this->validateContactInfoRequest($request);

      $this->updateContactInfo($request);

      $this->sendMail( $this->user,
        'Your contact information has been updated',
        'emails.settings.settings_update_contact'
      );

      return redirect()
        ->route('settings')
        ->with('flash_success',
          'Your contact information has been successfully updated.');
    }

    public function getPasswordChange()
    {
      return view('pages/settings/password')
        ->with('user', $this->user);
    }

    public function updateUserPassword(Request $request)
    {
      $this->validatePasswordRequest($request);

      $this->updatePassword($request);

      $this->sendMail( $this->user,
        'Your password has been updated',
        'emails.settings.settings_update_password'
      );

      return redirect()
        ->route('settings.password')
        ->with('flash_success',
          'Your password has been successfully updated.');
    }

    public function upgradeAccount(){
      if(!$this->user->free()){
        return redirect()
          ->route('settings.subscription.change');
      }
      return 'test';
    }

    public function changePlan(){
      if($this->user->free()){
        return redirect()
          ->route('settings.upgrade');
      }
      return 'changePlan';
    }



    private function hasEmailBeenUpdated($request){
      return $this->user->email != $request->get('email');
    }

    private function updateContactInfo($request){
      $this->user->name = $request->get('name');
      $this->user->email = $request->get('email');
      $this->user->save();
    }

    private function updatePassword($request){
      $this->user->password = \Hash::make( $request->get('password') );
      $this->user->save();
    }

    private function validateContactInfoRequest($request){
      if ( $this->hasEmailBeenUpdated( $request ) )
      {
        $this->validate($request, $this->user->validationRules['contact_info_with_new_email'] );
      }
      else{
        $this->validate($request, $this->user->validationRules['contact_info_with_same_email'] );
      }
    }

    private function validatePasswordRequest($request){
      $this->validate($request, $this->user->validationRules['password'] );
    }

}
