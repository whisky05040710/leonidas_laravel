<?php

namespace App\Http\Controllers;

use App\Models\StaffUser;
use App\Models\User;
use App\Http\Requests\StoreStaffUserRequest;
use App\Http\Requests\UpdateStaffUserRequest;

class StaffUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffUsers = StaffUser::with('user')->get();

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
    public function store(StoreStaffUserRequest $request)
    {
        $validatedData = $request->validated();

        $imagePath = $validatedData['profile']->store('profile','public');

        $user = new User();
        $user->fill([
            'email' => $validatedData['email'],
            'password'=> bcrypt($validatedData['password']),
        ]);
        $user->save();

        $user_id = $user->id;


        StaffUser::create([
            'user_id'=> $user_id,
            'firstname' => $validatedData['firstname'],
            'lastname'=> $validatedData['lastname'],
            'role' => $validatedData['role'],
            'profile' => $imagePath,
            ]);
            alert()->success('success','Staff Account have been created');
            return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffUser $staffUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffUser $staffUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffUserRequest $request, StaffUser $staffUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffUser $staffUser)
    {
        //
    }
}
