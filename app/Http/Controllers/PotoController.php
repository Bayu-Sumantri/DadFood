<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotoController extends Controller
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        {
            $request->validate([
                'Profile'  => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ]);
    
            
            if ($user->profile) {
                // Menghapus profil pengguna jika ada
                Storage::delete($user->profile);
            }
            $path = $request->file('Profile')->store('Profile');
    
    
            $user->update([
                "Profile"  => $path
            ]);
    
            return redirect()->route('admin.user.Myprofile');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}