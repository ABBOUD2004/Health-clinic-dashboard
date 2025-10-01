<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class BugReportController extends Controller
{
    // عرض صفحة التقرير
    public function index()
    {
        return view('report.bug');
    }

    // معالجة الفورم
    public function submit(Request $request)
    {
        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // هنا ممكن تخزن البيانات في قاعدة بيانات أو ترسل ايميل
        // مثال حفظ في جدول bug_reports (لو موجود)
        // \App\Models\BugReport::create($request->all());

        // مثال ارسال ايميل (تأكد من إعداد Mail في Laravel)
        // Mail::to('admin@example.com')->send(new \App\Mail\BugReportMail($request->all()));

        // رسالة نجاح
        return redirect()->back()->with('success', 'Thank you! Your bug report has been submitted.');
    }
}
