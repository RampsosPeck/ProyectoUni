<?php

namespace Infraestructura\Http\Controllers\Auth;

use Infraestructura\User;
use Validator;
use Infraestructura\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $username = 'cedula';

    //Número intentos para loguearse
    protected $maxLoginAttempts = 3;
    //Le damos un tiempo en segundos para volver a loguearse
    //protected $lockoutTime = 60;
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|confirmed|min:5|max:10',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    /*protected function create(array $data)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
        /*$user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        $user->rol = 'usuario';
        $user->save();
        
        return $user;
    }*/
    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return route('login');
    }
     /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route('auto');
    }

    /**
     * Get the needed autorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return [
            'cedula' => $request->get('cedula'),
            'password'=>$request->get('password'),
            'active' => true
        ];
    }
    /**
     * Get the login lockout error message.
     *
     * @param  int  $seconds
     * @return string
     */
    protected function getLockoutErrorMessage($seconds)
    {
        /*$minutos = round($seconds / 60);

        return \Lang::has('auth.throttle')
            ? \Lang::get('auth.throttle', ['minutos' => $minutos])
            : 'Too many login attempts. Please try again in '.$seconds.' seconds.';
        */
        return \Lang::has('auth.throttle')
        ? \Lang::get('auth.throttle', ['seconds' => $seconds])
        : 'Too many login attempts. Please try again in '.$seconds.' seconds.';
    }
}






