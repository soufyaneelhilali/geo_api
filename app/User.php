<?php

namespace App;

use App\Tools\ModelUtility;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable,ModelUtility;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'email', 'password','lastname','login','type'
    ];
    protected $relations = ['layers','maps'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
    public function findForPassport($username) {
        $user = $this->where('login',$username)->orWhere('email',$username)->first();
        return $user;
    }
    public function maps ()
    {
        return $this->hasMany('App\Map');
    }
    public function layers ()
    {
        return $this->hasMany('App\Layer');
    }




}
