<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function settings()
    {
        $user = auth()->user();
        return view('user.settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($request->only('name', 'email', 'phone', 'address'));

        return back()->with('success', 'Settings updated successfully!');
    }
}
