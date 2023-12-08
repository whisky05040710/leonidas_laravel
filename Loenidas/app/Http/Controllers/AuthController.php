<?php

namespace App\Http\Controllers;

use App\Http\Requests\signupCustomerRequest;
use App\Http\Requests\signinRequest;
use App\Models\StaffUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
            $user = Auth::user();
            $user_id = auth()->id();

            $staff = StaffUser::where('user_id', $user_id)->first();


        if ($user->role === 'Customer') {
            return redirect()->route('customer.menu', ['id' => $user->id]);
        } elseif ($staff->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($staff->role === 'Manager') {
            return redirect()->route('sales.salesDaily');
        } elseif ($staff->role === 'Chef') {
            return redirect()->route('menu.index');
        } elseif ($staff->role === 'Cashier') {
            return redirect()->route('pos.index');
        } elseif ($staff->role === 'Waiter') {
            return redirect()->route('orders.ordersWaiter');
        }
        }
    }
    public function signup_customer(Request $request){
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:Customer',
        ]);

        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);
        
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

    public function customerProfile()
    {
        return view("customer.customerProfile");
    } 



}
