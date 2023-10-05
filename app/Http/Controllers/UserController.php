<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('name', 'asc')->simplePaginate(3);
        $total_user = User::count();
        return view('admin_master.admin_sup.users',compact('user', 'total_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_master.admin_sup.users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required',
            'level' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);
        return redirect()->route('Users.index')->with('success', "successfully Create user");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = user::findOrfail($id);
        return view('admin_master.user_admin.user_list', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);            
        return view('admin_master.side_admin.user_edit', compact('user'));
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
    public function destroy(string $id, User $user)
    {
        $user = User::findOrFail($id);
        $profilePath = $user->Profile;
  
        if (!is_null($profilePath)) {
          Storage::delete($profilePath);
      }
  
      $user->delete();
  
      $user = User::orderBy('name', 'asc')->simplePaginate(3);
      $total_user = User::count();
    }
}