<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('landing_pages.pemesanan_menu.pesan_menu', compact('pemesanan', 'total_pemesanan'));
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
        // Validasi input
        $data = $request->validate([
            'user_id' => ['required'],
            'id_makanan' => ['required'],
            'alamat_pengiriman' => ['required', 'max:255'],
            'total_pemesanan' => ['required', 'numeric', 'not_in:0', 'max:9000'], // Menambahkan validasi numerik, tidak boleh 0, dan maksimal 9000
        ]);

        // Menyimpan data pemesanan jika validasi sukses
        Pemesanan::create([
            "user_id" => $request->user_id,
            "id_makanan" => $request->id_makanan,
            "alamat_pengiriman" => $request->alamat_pengiriman,
            "total_pemesanan" => $request->total_pemesanan,
        ]);

        return redirect(route('dashboard'))->with('success', "Pemesanan berhasil diunggah.");
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
        $pemesanan = Pemesanan::findOrFail($id);
        return view('admin_master.user_sup.pembelian_user', compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update([
            'total_pemesanan' => $request->total_pemesanan,
            'alamat_pengiriman' => $request->alamat_pengiriman,
        ]);

        $pemesanan->pembayaran()->create([
            'id_makanan' => $request->id_makanan,
            'id_pemesanan' => $request->id_pemesanan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'nomor_dana' => $request->nomor_dana,
            'rekening_bank' => $request->rekening_bank,
            'alamat_tujuan' => $request->alamat_tujuan,
        ]);

        Alert::success('Berhasil', 'Success Payment');
        return redirect(route('pembelian_show'))->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pemesanan::findOrfail($id);
        // return $pemesanan;
        // Hapus data terkait di tabel pembayarans
        $data->pembayaran()->delete();

        // Hapus data di tabel pemesanans
        $data->delete();
        Alert::success('Berhasil', 'Success Delete');
        return back()->with('success');
    }
}
