<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
       // dd($request->all());//
        $validated = $request->validate([
            // 'user_id' => 'required',
            // 'name' => 'required',
            // // 'email' => 'required',
            // 'mobile' => 'required',
            // 'date' => 'required',
            // 'time' => 'required',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',


            'email' => 'required|email',
            // 'mobile' => 'required|string|max:10',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'gender' => 'required|string|max:10',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|string|max:255',

        ]);

        // dd($validated);

        // $validated['password'] = bcrypt('password');
        // empty variable validated
        // $validated = $request->all();

        Booking::create($validated);

        return redirect()->route('booking.status')->with('success', 'You have booked the appoinment successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
