<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidedTourController extends Controller
{
    // نضيف middleware لو عايز المستخدم يكون مسجل دخول
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        // نرجع الـ view للـ Guided Tour
        return view('guided-tour.index');
    }
}
