<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservations;
use App\Models\Tables;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $reservationsTable = Reservations::whereDate('updated_at', today())->get();

        $availableTables = [];
        
        foreach ($reservationsTable as $reservation) {
            $selectedDate = Carbon::parse($reservation->date);
            $selectedTime = Carbon::parse($reservation->time);
        
            $startTime = $selectedTime->copy()->subHour();
            $endTime = $selectedTime->copy()->addHour();
        
            $reservedTables = Tables::whereHas('reservations', function ($query) use ($selectedDate, $startTime, $endTime) {
                $query->whereDate('date', $selectedDate)
                    ->whereTime('time', '>=', $startTime)
                    ->whereTime('time', '<=', $endTime)
                    ->where('status', 'Confirm');
            })->pluck('id');
        
            $availableTables[$reservation->id] = Tables::whereDoesntHave('reservations', function ($query) use ($selectedDate, $startTime, $endTime) {
                $query->whereDate('date', $selectedDate)
                    ->whereTime('time', '>=', $startTime)
                    ->whereTime('time', '<=', $endTime)
                    ->where('status', 'Confirm');
            })->get();
        }




        $reservations = Reservations::whereDate('updated_at', today())
        ->where('status', 'Pending')
        ->get();

    $confirms = Reservations::whereDate('updated_at', today())
        ->where('status', 'Confirm')
        ->get();

    $declines = Reservations::whereDate('updated_at', today())
        ->where('status', 'Decline')
        ->get();

        return view('admin.reservationList', compact('availableTables','reservations', 'confirms', 'declines' ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservations $reservations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservations $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations $reservations)
    {
        // Validate your request data as needed

    $table = $request->input('table');
    $status = $request->input('status');


    if ($reservations) {
        $reservations->table = $table;
        $reservations->status = $status;
        $reservations->save();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Table assigned successfully.');
    }

    // Redirect or respond in case of an error
    return redirect()->back()->with('error', 'Reservation not found.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservations $reservations)
    {
        //
    }
}
