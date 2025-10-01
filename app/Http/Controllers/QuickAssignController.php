<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;

class QuickAssignController extends Controller
{
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('quick-assign.create', compact('doctors', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_time' => 'required|date',
        ]);

        Appointment::create($request->only('doctor_id','patient_id','appointment_time'));

        return back()->with('success','Appointment assigned successfully!');
    }

    // لحفظ مريض جديد مباشرة عبر AJAX
    public function storePatient(Request $request)
    {
        $request->validate(['name'=>'required|string|max:255']);
        $patient = Patient::create(['name'=>$request->name]);
        return response()->json($patient); // نرجع البيانات للـ JS
    }
}
