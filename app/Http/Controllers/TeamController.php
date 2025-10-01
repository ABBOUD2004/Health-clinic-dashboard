<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        // لازم يكون وارث Controller عشان middleware شغال
        $this->middleware(['auth', 'verified']);
    }

    public function invite()
    {
        return view('team.invite');
    }

    public function submitInvite(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        \App\Models\Invite::create([
            'user_id' => auth()->id(),
            'email' => $request->email,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Invite sent successfully!');
    }
}
