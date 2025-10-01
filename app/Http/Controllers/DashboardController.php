<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\PatientRequest;
use App\Models\Doctor;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // إحصائيات عامة
        $outstandingReviews = PatientRequest::where('status', 'action_required')->count();
        $tasks = PatientRequest::where('status', 'pending')->count();

        // آخر 5 مرضى
        $patients = Patient::with('doctor')->latest()->take(10)->get();

        $usersCount = User::count();
        $sessionsCount = DB::table('sessions')->count();
        $revenue = 4320;

        $doctors = Doctor::all();

        return view('dashboard.index', compact(
            'user',
            'usersCount',
            'sessionsCount',
            'revenue',
            'outstandingReviews',
            'tasks',
            'patients',
            'doctors'
        ));
    }
    public function profile()
    {
        return view('profile.show'); // أو أي view أنت عاوزه
    }
    public function settings()
    {
        $user = auth()->user(); // أو Auth::user()
    return view('settings', compact('user'));

    }
    public function tasks()
    {
        $user = Auth::user();

        $tasks = PatientRequest::where('assigned_to', $user->id)
            ->where('status', 'pending')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

}

