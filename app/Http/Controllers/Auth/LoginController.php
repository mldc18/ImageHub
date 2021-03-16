<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $maxAttempts = 3;
    protected $decayMinutes = 5;
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }   

    public function googleRedirect(){
        try {
            $user = Socialite::driver('google')->user();    
        } catch (\Exception $e) {
            return redirect('/login');
        }
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        }else {
            // create a new employee
            $newUser                 = new User;
            $newUser->username       = substr(md5(mt_rand()), 0, 7);
            $newUser->lastname       = $user['family_name'];
            $newUser->firstname      = $user['given_name'];
            $newUser->email          = $user->email;
            $newUser->password       = '';
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
      }
}
