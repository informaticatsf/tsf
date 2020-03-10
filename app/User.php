<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'remember_token', 'estado', 'persona'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function listadoMenes($men) {
        //dd($regimen);
       if ($men=='0312')
            {$query='';
                $menes =  DB::select('call ListaMenes(?)',array('0312'));
               return view('user.index', compact('menes', 'query'));}
            else{$query = $_GET['men'];            
            $menes =  DB::select('call ListaMenes(?)',array($query));
            return view('user.index', compact('menes', 'query'));
            }
  }
}
