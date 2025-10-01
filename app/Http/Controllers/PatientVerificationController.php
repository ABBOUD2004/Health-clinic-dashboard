<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientVerificationController extends Controller
{
    public function index()
    {
        // هات كل المرضى من جدول patients
        $patients = Patient::all();

        return view('patients.verification', compact('patients'));
    }

    public function verify(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
        ]);

        $patient = Patient::findOrFail($request->patient_id);
        $patient->status = 'verified';
        $patient->notes = $request->message;
        $patient->save();

        return redirect()->route('patient.verify')->with('success', 'Patient verified successfully!');
    }
}

