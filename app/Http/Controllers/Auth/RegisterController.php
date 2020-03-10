<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rolx:desarrollador');
    }

    public function register(Request $request){
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return redirect()->route('users.index')
        ->with('info', 'Usuario guardado con exito');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dpi' => ['required', 'string', 'min:15', 'unique:persona'],
            //'nombre' =>['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'sexo' => ['required', 'string', 'max:10'],
            'fechanac' => ['required', 'date'],
            'direccion' =>['required', 'string', 'max:255'],
        ]);
    }
    public function personacrear(array $datos){
        $datos=DB::select('call crearpersona(?,?,?,?,?,?,?)', 
       [$datos['iduser'],
        $datos['name'],
        $datos['apellido'],
        $datos['dpi'],
        $datos['sexo'],
        $datos['fechanac'],
        $datos['direccion']]);
        return $datos[0]->id;
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $idpersona = $this->personacrear($data);
        return User::create([
            'name'     => $data['name'],
            'persona'  => $idpersona,
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'estado' => 1,
        ]);
    }
}
