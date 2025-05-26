<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->oldest()->get();
        return view('profile.index', compact('user', 'orders'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'birth_date' => 'nullable|date',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string|max:500',
        ]);

        $user->update($validated);

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
