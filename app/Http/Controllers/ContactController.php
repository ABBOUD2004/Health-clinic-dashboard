<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRequest;
use App\Models\Patient;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Message;

class ContactController extends Controller
{
    // عرض كل الطلبات
   public function index()
{
    // كل المرضى
    $patients = Patient::all();

    return view('contact.index', compact('patients'));
}


    // إرسال رسالة لمريض
public function send(Request $request)
{
    $request->validate([
        'patient_id' => 'required|exists:patients,patient_id', // تعديل هنا
        'message'    => 'required|string',
    ]);

    $patient = Patient::findOrFail($request->patient_id);

    if ($patient->email) {
        Mail::to($patient->email)->send(new ContactMail($request->message));
    }

    return back()->with('success', 'Message sent to ' . $patient->patient_name . ' successfully!');
}


    // إضافة مريض جديد
    public function storePatient(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
        ]);

        $patient = Patient::create($request->only('name', 'email', 'phone'));

        return response()->json($patient);
    }
     public function messages()
    {
        $messages = Message::all(); // هتجيب كل الرسائل
        return view('messages.index', compact('messages'));
    }
}
