<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $validationRules = [
      'contact_info_with_new_email' => [
        'name' => 'required|min:2|max:255',
        'email' => 'required|email|max:255|unique:users'
      ],
      'contact_info_with_same_email' => [
        'name' => 'required|min:2|max:255',
        'email' => 'required|email|max:255'
      ],
      'password' => [
        'password' => 'required|min:6|confirmed'
      ],
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function accesses()
    {
        return $this->belongsToMany('App\Access');
    }

    public function role(){
      return $this->roles->first()->name;
    }

    public function access(){
      return $this->accesses->first()->name;
    }
}
