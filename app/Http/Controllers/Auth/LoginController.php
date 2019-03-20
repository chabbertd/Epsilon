<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use App\Log;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/home';

    // *
    //  * Create a new controller instance.
    //  *
    //  * @return void
     
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


 public function __construct(){

    $this->middleware('guest', ['only' => 'showLoginForm']);
 }



 public function showLoginForm(){

        return view('welcome');
    }


 public function login(){

    $credentials = $this->validate(request(), [

        'username' => 'required|string',
        'password' => 'required|string',        

    ]);

    if (Auth::attempt($credentials))
        { 
            if (auth()->user()->suspendido == true){
                Auth::logout();
                return back()
                ->withErrors(['username' => 'El usuario se encuentra suspendido.'])
                ->withInput(request(['username']));
            }
            
            $log = new Log();
            $log->user_id = Auth::user()->id;
            $log->descripcion = 'Ingreso al sistema';
            $log->save();

            return redirect()->route('home');
            }    
    else
        { 
            return back()
                ->withErrors(['username' => trans('auth.failed')])
                ->withInput(request(['username']));

        }

    }


 public function logout(){

    $log = new Log();
    $log->user_id = Auth::user()->id;
    $log->descripcion = 'Salida del sistema';
    $log->save();

    Auth::logout();

    return redirect('/');

 }


}
