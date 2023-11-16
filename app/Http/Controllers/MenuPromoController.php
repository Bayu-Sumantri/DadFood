<?php

namespace App\Http\Controllers;

use App\Models\MenuPromo;
use Illuminate\Http\Request;

class MenuPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promo = MenuPromo::orderBy('nama_makanan', 'asc')->simplePaginate(3);
        $total_promo = MenuPromo::count();
        return view('admin_master.admin_sup.menu_promo.index',compact('promo', 'total_promo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_master/admin_sup/menu_promo/index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_makanan'                     =>  ['required','string','max:255'],
            'gambar_makanan'                   =>  ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5048'],
            'deskripsi_lengkap'                =>  ['required','string','max:255'],
            'deskripsi_singkat'                =>  ['required','string','max:255'],
            'harga_sebelumnya'                 =>  ['required','string','max:255'],
            'harga_final'                      =>  ['required','string','max:255'],
        ]);
        $images = $request->file('gambar_makanan')->store('gambar_promo');
        // return $data;

        MenuPromo::create([
            "nama_makanan"                     => $request->nama_makanan,
            "gambar_makanan"                   => $images,
            "deskripsi_lengkap"                => $request->deskripsi_lengkap,
            "deskripsi_singkat"                => $request->deskripsi_singkat,
            "harga_sebelumnya"                 => $request->harga_sebelumnya,
            "harga_final"                      => $request->harga_final,

        ]);

        // return $data;

        return redirect(route('promocreate'))->with('success', "successfully uploaded your anime");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promo = MenuPromo::findOrfail($id);
        $allpromo = MenuPromo::all();

        return view('admin_master.admin_sup.menu_promo.show_promo', compact('promo','allpromo'));
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
        $promo = MenuPromo::findOrFail($id);
        $images = $request->file('gambar_makanan')->store('gambar_promo');
        $promo -> update([
            "gambar_makanan"        => $images,
           'deskripsi_lengkap'           =>$request->deskripsi_lengkap,  
           'deskripsi_singkat'           =>$request->deskripsi_singkat,  
           'harga'           =>$request->harga,  
       ]);
// return $food;

        return redirect( route('menu_show'))->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}