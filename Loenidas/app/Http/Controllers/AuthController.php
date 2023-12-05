<?php

namespace App\Http\Controllers;

use App\Http\Requests\signupCustomerRequest;
use App\Http\Requests\signinRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function signin()
    {
        return view("signin");
    }
    
    public function signin_store(signinRequest $request)
    {
        $validatedData = $request->validated();
        if (Auth::attempt($validatedData) ){
            return redirect()->route('staffs.index');
        }
    }
    public function signup_customer(signupCustomerRequest $request){
        $validatedData = $request->validated();

        User::create($validatedData);
        
        return redirect()->route('signin');
    }
    public function logout()
    { 
        Auth::logout();
        return redirect()->route('signin');
    }

    public function customerSignup()
    {
        return view("customerSignup");
    }


}
