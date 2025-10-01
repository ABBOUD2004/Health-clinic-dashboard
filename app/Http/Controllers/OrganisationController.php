<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function settings()
    {
        $organisation = [
            'name' => 'My Clinic',
            'email' => 'info@myclinic.com',
            'phone' => '+201234567890',
            'address' => 'Cairo, Egypt',
        ];

        return view('organisation.settings', compact('organisation'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        return back()->with('success', 'Organisation settings updated successfully!');
    }
}
