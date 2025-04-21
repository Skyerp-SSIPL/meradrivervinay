<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\View\View;
use App\Jobs\SendOTPJob;
use App\Mail\SendOtp;
use App\Models\VerificationOtp;
use Hash;
use Log;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function user_login()
    {
        return view('auth.user-login');
    }

    public function send_otp_job($details){
        dispatch(new SendOTPJob($details));
    }
    public function sendOTP(Request $request){
        $this->validate($request, [
            'email' => 'required',
        ],[]);

        $email = request()->get('email');
        $user = User::where('email',$email)->first();
        if($user == null){
            return "Email Not Registered";
        }
        $otp = rand(100000, 999999);
        $exist_data = VerificationOtp::where("email", $email)->first();
        if($exist_data){
            VerificationOtp::where("email", $email)->delete();
        }

        $details=[
            'otp'=>$otp
        ];

        $smsmessage="Your overseas education lane login OTP is ".$otp;
        $data = ['method' => 'sms',
        'api_key' => env('SMS_API_KEY'),
        'to' => $user->phone_number,
        'sender'=> env('SMS_SENDER'),
        'unicode' => 'auto',
        'message' => $smsmessage,
        'format'=>'json'];

        VerificationOtp::create(['email'=>$email,'phone_number'=>request()->input('phone_number'),'email_otp'=>$otp,'type'=>'login']);

        try{
            Mail::to($email)->queue(new SendOtp($otp));
        }catch(\Exception $ex) {
            $stack_trace = $ex->getTraceAsString();
            $message = $ex->getMessage().$stack_trace;
            Log::error($message);
        }

        try{
            // Send OTP --
            $this->send_otp_job($data);
            session()->put('WithdrawEmailOtp', $otp);
            echo 'success';
        }catch(\Exception $e){
            session()->put('WithdrawEmailOtp', $otp);
            echo 'success';
        }
    }
    protected function verifyOTP(Request $request)
    {
       
        $user = User::where('email',$request->input('email'))->first();
        Session::put('account_type',$request->input("account_type"));
        if($user){ //$user->account_type =='admin'
            if(false){
               
                $user = User::where('email', $request->input('email'))->first();
                Auth::loginUsingId($user);
                return redirect()->route('dashboard');
            }else{
                $login_type = $request->input('login_type');
                if($login_type == "otp"){
                    $otp = VerificationOtp::where('email',$request->input('email'))->where('type','login')->where('created_at', '>=', Carbon::now()->subMinutes(15)->toDateTimeString())->latest()->first();
                    if(!$otp || ($otp->email_otp!=$request->input('otp'))) {
                        flash()->error('Please enter correct otp');
                        return redirect()->back()->withInput();
                    }
                    if($user->is_active === 0){
                        flash()->error('Your account is disabled !');
                        return redirect()->back()->withInput();
                    }
                    Auth::loginUsingId($user->id);
                    VerificationOtp::where("email", $request->input("email"))->delete();
                    return redirect()->route('dashboard');
                }else if($login_type == "password"){
                 

                    if($user->is_active === 1){
                       
                        $hashedPassword = $user->password ?? '';
                        
                       
                    if (Hash::check($request->input('password'), $hashedPassword)) {
                        
                        Auth::loginUsingId($user->id);
                        VerificationOtp::where("email", $request->input("email"))->delete();
                    }else{
                        session()->flash('status', 'Please enter correct password!');                       
                        flash()->error('Please enter correct password !');
                        return redirect()->back()->withInput();
                    }
                    }
                    else{
                        flash()->error('Your account is disabled !');
                        return redirect()->back()->withInput();
                    }
                    // Session --
                    Session::put('notify_lead', true);
                    return redirect()->route('dashboard');
                
                }
            }
        }else{
            flash()->error('Email not registered. Register your account.');
            return redirect()->back()->withInput();
        }
    }
}
