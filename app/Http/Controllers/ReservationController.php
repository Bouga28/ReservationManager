<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Resource,Type,Reservation};

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::paginate(10);
        return $reservations;
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
    public function store(Request $request)
    {
        $request->validate([
            'deb' => 'required',
            'fin' => 'required',
        ]);
 
        $reservation = Reservation::create($request->all());
        return [
            "status" => 1,
            "data" => $reservation
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return $reservation;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rservation $reservation)
    {
        $request->validate([
            'deb' => 'required',
            'fin' => 'required',
        ]);
 
        $reservation->update($request->all());
 
        return [
            "status" => 1,
            "data" => $reservation,
            "msg" => "Rservation updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rservation $reservation)
    {
        $reservation->delete();
        return [
            "status" => 1,
            "data" => $reservation,
            "msg" => "Reservation deleted successfully"
        ];
    }
}
