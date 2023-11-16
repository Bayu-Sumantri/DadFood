<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $food = Food::orderBy('nama_makanan', 'asc')->simplePaginate(10);
        $pemesanan = Pemesanan::orderBy('alamat_pengiriman', 'asc')->simplePaginate(10);
        $total_pemesanan = Pemesanan::count();
        return view('landing_pages.pemesanan_menu.pesan_menu',compact('pemesanan', 'total_pemesanan'));
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
        // return $request;
        $data = $request->validate([
            'user_id' =>  ['required'],
            'id_makanan' =>  ['required'],
            'alamat_pengiriman' =>  ['required','max:255'],
            'total_pemesanan' =>  ['required','max:255'],
        ]);


        Pemesanan::create([
            "user_id"     => $request->user_id,
            "id_makanan"     => $request->id_makanan,
            "alamat_pengiriman"     => $request->alamat_pengiriman,
            "total_pemesanan"     => $request->total_pemesanan,
        ]);

        return redirect(route('dashboard'))->with('success', "successfully uploaded your anime");
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