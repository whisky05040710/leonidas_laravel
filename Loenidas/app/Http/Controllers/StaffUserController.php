<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStaffUserRequest;
use App\Http\Requests\UpdateStaffUserRequest;

class StaffUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffUsers = User::whereNotIn('role', ['Customer'])->get();
        return view("admin.staffUser", compact("staffUsers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.staffUserAdd");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'role' => 'required|string|in:Manager,Head Chef,Cashier,Waiter',
            'profile' => 'nullable',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8',
            
        ]);

        $imagePath = $validatedData['profile']->store('profile','public');

        User::create([
            'firstname' => $validatedData['firstname'],
            'lastname'=> $validatedData['lastname'],
            'role' => $validatedData['role'],
            'profile' => $imagePath,
            'accountStatus' => 'Active',
            'email' => $validatedData['email'],
            'password'=> bcrypt($validatedData['password']),
            ]);
            alert()->success('success','Staff Account have been created');
            return redirect('/staffs');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $staffUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $staffUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffUserRequest $request, User $staffUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $staffUser)
    {
        //
    }
}
