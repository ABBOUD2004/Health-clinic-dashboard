<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctors.create')->with('success', 'Doctor added successfully!');
    }
}
