<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCodeNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {

        $role = (Auth::User()->roles()->get())[0]->title;
//dd($role);
        switch ($role) {
            case 'Admin':
              return '/home';
              break;
            case 'User':
              return '/home';
              break; 

            case 'SFWA':
              return '/warehouse';
              break; 
        
            default:
              return '/home'; 
            break;
          }


        //if (auth()->user()->is_admin) {
            //return '/admin';
        //}

        //return '/home';
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->two_factor) {
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCodeNotification());
        }
    }
}
