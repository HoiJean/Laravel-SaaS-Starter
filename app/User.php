<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
}
