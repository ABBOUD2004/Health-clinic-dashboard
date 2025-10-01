<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRequest;
use App\Models\Doctor;

class RequestController extends Controller
{
    // 🟢 عرض كل الطلبات
    public function index()
    {
        $requests = PatientRequest::latest()->get();
        $doctors = Doctor::all();
        return view('requests.index', compact('requests', 'doctors'));
    }

    // 🟢 صفحة إنشاء طلب جديد
    public function create()
    {
        return view('requests.create'); // أنشئ view باسم requests/create.blade.php
    }

    // 🟢 حفظ طلب جديد
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'indication' => 'required|string|max:255',
            'doctor_id' => 'nullable|exists:doctors,id',
            'appointment_date' => 'nullable|date',
        ]);

        PatientRequest::create($request->all());

        return redirect()->route('requests.index')
            ->with('success', 'Request created successfully.');
    }

    // 🟢 عرض تفاصيل طلب معين
    public function show($id)
    {
        $request = PatientRequest::findOrFail($id);
        $doctors = Doctor::all();
        return view('requests.show', compact('request', 'doctors'));
    }

    // 🟢 تعديل طلب
    public function edit($id)
    {
        $request = PatientRequest::findOrFail($id);
        $doctors = Doctor::all();
        return view('requests.edit', compact('request', 'doctors'));
    }

    // 🟢 تحديث طلب
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'patient_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'indication' => 'required|string|max:255',
            'status' => 'nullable|string',
            'doctor_id' => 'nullable|exists:doctors,id',
        ]);

        $patientRequest = PatientRequest::findOrFail($id);
        $patientRequest->update($requestData);

        return redirect()->route('requests.index')
            ->with('success', 'Request updated successfully.');
    }

    // 🟢 حذف طلب
    public function destroy($id)
    {
        $patientRequest = PatientRequest::findOrFail($id);
        $patientRequest->delete();

        return redirect()->route('requests.index')
            ->with('success', 'Request deleted successfully.');
    }

    // 🟢 تعيين طبيب لمريض
    public function assign(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $patientRequest = PatientRequest::findOrFail($id);
        $patientRequest->doctor_id = $request->doctor_id;
        $patientRequest->save();

        return redirect()->back()->with('success', 'Doctor assigned successfully.');
    }
}
