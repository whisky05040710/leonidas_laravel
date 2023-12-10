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
            

            if ($user->role === 'Customer') {
                return redirect()->route('customer.menu', ['id' => $user->id]);
            } else {
                switch ($user->role) {
                    case 'Admin':
                    case 'Manager':
                        return redirect()->route('dashboard.index');
                    case 'Head Chef':
                        return redirect()->route('menu.index');
                    case 'Cashier':
                        return redirect()->route('pos.index');
                    case 'Waiter':
                        return redirect()->route('orders.ordersWaiter');
                    default:
                        return redirect()->route('signin'); 
                }
            }
        }
    }
    public function signup_customer(Request $request){
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'role' => 'required|string|in:Customer',
            'account_status' => 'nullable',
            'profile' => 'nullable',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8',
            
        ]);

        User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
            'account_status' => $validatedData['account_status'] ?? null,
            'profile' => $validatedData['profile'] ?? null,
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
