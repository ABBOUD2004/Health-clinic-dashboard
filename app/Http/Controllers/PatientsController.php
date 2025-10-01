<?php

namespace App\Http\Controllers;

use App\Models\PatientRequest;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * عرض قائمة المرضى
     */
    public function index()
    {
        // نعرض المرضى مع الدكتور المرتبط بيهم
        $patients = Patient::with('doctor')->latest()->get();
        return view('patients.index', compact('patients'));
    }

    /**
     * عرض صفحة إضافة مريض جديد
     */
    public function create()
    {
        $doctors = Doctor::all(); // جلب جميع الأطباء
        return view('patients.create', compact('doctors'));
    }

    /**
     * صفحة التحقق من الطلبات
     */
    public function verification()
    {
        $patients = PatientRequest::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('patients.verification', compact('patients'));
    }

    /**
     * التحقق وتحديث الحالة
     */
    public function verifyPatient(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patient_requests,id',
            'message'    => 'nullable|string',
        ]);

        $patient = PatientRequest::findOrFail($request->patient_id);
        $patient->status = 'verified';
        $patient->notes  = $request->message ?? null;
        $patient->save();

        return redirect()->route('patients.verification')
            ->with('success', 'Patient ' . $patient->patient_name . ' verified successfully!');
    }
public function edit($id)
{
    $patient = Patient::findOrFail($id); // استدعاء المريض من قاعدة البيانات
    return view('patients.edit', compact('patient')); // رابط لصفحة تعديل المريض
}
public function destroy($id)
{
    $patient = Patient::findOrFail($id); // البحث عن المريض
    $patient->delete(); // حذف المريض
    return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
}
public function update(Request $request, Patient $patient)
{
    $request->validate([
        'patient_name' => 'required|string|max:255',
        'dob' => 'required|date',
        'indication' => 'required|string',
        'status' => 'required|string',
        'assigned_to' => 'nullable|string',
    ]);

    $patient->update($request->only([
        'patient_name',
        'dob',
        'indication',
        'status',
        'assigned_to'
    ]));

    return redirect()->route('patients.index')->with('success', 'Patient updated successfully');
}
public function show($id)
{
    $patient = Patient::with('doctor')->findOrFail($id); // المريض مع الدكتور
    return view('patients.profile', compact('patient'));
}
public function profile($id)
{
    $patient = Patient::with('doctor')->findOrFail($id);
    return view('profile', compact('patient'));
}


    /**
     * تخزين بيانات المريض الجديد
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_name'      => 'required|string|max:255',
            'patient_id'        => 'required|string|max:255|unique:patients,patient_id',
            'age'               => 'required|integer|min:0',
            'disease'           => 'required|string|max:255',
            'doctor_id'         => 'required|exists:doctors,id',
            'appointment_date'  => 'required|date',
        ]);

        Patient::create([
            'patient_name'      => $request->patient_name,
            'patient_id'        => $request->patient_id,
            'age'               => $request->age,
            'disease'           => $request->disease,
            'doctor_id'         => $request->doctor_id,
            'appointment_date'  => $request->appointment_date,
        ]);

        return redirect()
            ->route('patients.index')
            ->with('success', '✅ Patient added successfully!');
    }

}
