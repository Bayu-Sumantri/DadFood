<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembayaran::whereHas('pemesanan', function ($query) {
            $query->whereHas('user', function ($query1) {
                return $query1->where('id', auth()->id());
            });
        })->paginate('10');

        $total_pembayaran = Pembayaran::count();


        return view('admin_master.user_sup.pembelian.index',compact('pembelian'));
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
        //
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
        $pembelian = Pembayaran::findOrFail($id);

        return view('admin_master.admin_sup.edit.all_transaksi_edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the user by ID
        $pembelian = Pembayaran::findOrFail($id);

        // Update user data
        $pembelian->update([
            'status' => $request->status,
        ]);


        Alert::success('Berhasil', 'Respon Sudah Diubah');
        return redirect()->route('all_transaksi')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
