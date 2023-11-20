<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            // Jika belum login, arahkan ke form login
            return redirect('/login');
        }
    
        // Jika sudah login, lanjutkan proses dan masukan ke menu dashboard
        $booking = Booking::orderBy('name', 'asc')->get();
    
        return view('landing_pages.master', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('landing_pages.master');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $user_Id = $request->user_id ?? null; // Set user_id to null if not provided

        $data = $request->validate([
            'name'                      => ['required', 'string', 'max:255'],
            'email'                     => ['required', 'string', 'max:255'],
            'number_phone'              => ['required', 'string', 'max:255'],
            'guests'                    => ['required', 'string', 'max:255'],
            'tanggal_reservasi'         => ['required', 'string', 'max:255'],
            'table_name'                => ['required', 'string', 'max:255'],
        ]);
        
        Booking::create([
            "user_id"                   => $user_Id,
            'name'                      => $request->name,
            'email'                     => $request->email,
            'number_phone'              => $request->number_phone,
            'guests'                    => $request->guests,
            'tanggal_reservasi'         => $request->tanggal_reservasi,
            'table_name'                => $request->table_name,
        ]);
        // return $data;

        return redirect(route('booking_table'))->with('success', 'successfully uploaded your anime');
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