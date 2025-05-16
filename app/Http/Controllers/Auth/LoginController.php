<?php

namespace App\Http\Controllers\Auth;

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

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        
       
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            /*if(auth()->user() && auth()->user()->status === 0){
                //die('53');
                throw ValidationException::withMessages([
                    'inactive_account' => 'Your account is inactive, please contact to administrative.',
                ]);
            }*/
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    public function requestOtp(Request $request)
{
    $request->validate(['email' => 'required|email']);

    // Generate and send OTP (e.g., via email or SMS)
    $otp = rand(100000, 999999);
    Cache::put('otp_' . $request->email, $otp, now()->addMinutes(10));

    // Send email logic here
    Mail::to($request->email)->send(new SendOtpMail($otp));

    return back()->with('message', 'OTP sent to your email.');
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|numeric',
    ]);

    $cachedOtp = Cache::get('otp_' . $request->email);

    if ($cachedOtp && $cachedOtp == $request->otp) {
        // Log the user in
        $user = User::where('email', $request->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors(['email' => 'User not found.']);
        }
    }

    return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
}

}
