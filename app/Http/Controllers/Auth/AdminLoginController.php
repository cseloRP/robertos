<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\reCaptchaTrait;

class AdminLoginController extends Controller
{

    use reCaptchaTrait;

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('auth.adminLogin');
    }

    public function login(Request $request){

        $request['captcha'] = $this->validateCaptchaResponse();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response'=>'required',
            'captcha'=>'min:1',
        ],
        [
            'captcha.min' => 'Unsuccessful login!',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
