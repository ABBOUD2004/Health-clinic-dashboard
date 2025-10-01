<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    // دالة لعرض صفحة المساعدة
    public function index() {
        return view('help.index'); // يتوافق مع resources/views/help/index.blade.php
    }

    // عرض صفحة إعدادات المستخدم
    public function settings() {
        $user = auth()->user();
        return view('user.settings', compact('user'));
    }

    // تحديث بيانات المستخدم
    public function update(Request $request) {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($request->only('name', 'email', 'phone', 'address'));

        return back()->with('success', 'Info updated successfully!');
    }

    // تغيير كلمة المرور
    public function changePassword(Request $request) {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!\Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update(['password' => \Hash::make($request->password)]);

        return back()->with('success', 'Password changed successfully!');
    }
}
