<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $food = Food::orderBy('nama_makanan', 'asc')->simplePaginate(50);
        $total_food = Food::count();
        return view('admin_master.admin_sup.create_menu',compact('food', 'total_food'));
    }


    public function peemesanan()
    {
        $food = Food::orderBy('nama_makanan', 'asc')->simplePaginate(50);
        $total_food = Food::count();
        return view('landing_pages.pemesanan_menu.pesan_menu',compact('food', 'total_food'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_master.admin_sup.create_menu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_makanan'          =>  ['required','string','max:255'],
            'gambar_makanan'        =>  ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5048'],
            'deskripsi_lengkap'     =>  ['required','string','max:255'],
            'deskripsi_singkat'     =>  ['required','string','max:255'],
            'harga'                 =>  ['required','string','max:255'],
            'category'              =>  ['required','string','max:255'],
        ]);
        $images = $request->file('gambar_makanan')->store('gambar_makanan');

       $food = Food::create([
            "nama_makanan"          => $request->nama_makanan,
            "gambar_makanan"        => $images,
            "deskripsi_lengkap"     => $request->deskripsi_lengkap,
            "deskripsi_singkat"     => $request->deskripsi_singkat,
            "harga"                 => $request->harga,
        ]);

       $food->Category()->create([
            "category"          => $request->category,
        ]);

        // return $data;

        return redirect(route('foodcreate'))->with('success', "successfully uploaded your anime");


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $food = Food::findOrfail($id);
        $allfood = Food::all();

        return view('admin_master.admin_sup.menu_show', compact('food','allfood'));
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
        $food = Food::findOrFail($id);
        $food -> update([
           'deskripsi_lengkap'           =>$request->deskripsi_lengkap,
           'deskripsi_singkat'           =>$request->deskripsi_singkat,
           'harga'              =>$request->harga,
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
