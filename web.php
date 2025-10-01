<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\QuickAssignController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\GuidedTourController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BugReportController;
use App\Http\Controllers\PatientVerificationController;


Route::view('/terms', 'terms')->name('terms.show');
Route::view('/privacy-policy', 'policy')->name('policy.show');
// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// صفحات محمية بالمستخدم المسجل
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tasks', [DashboardController::class, 'tasks'])->name('tasks.index');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.show');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');

    // Quick Assign
    Route::get('/quick-assign', [QuickAssignController::class, 'create'])->name('quick.assign.create');
    Route::post('/quick-assign', [QuickAssignController::class, 'store'])->name('quick.assign.store');
    Route::post('/quick-assign/patient', [QuickAssignController::class, 'storePatient'])->name('quick.assign.storePatient');

    // Patients CRUD
    Route::get('/patients', [PatientsController::class, 'index'])->name('patients.index');
    Route::get('/patients/create', [PatientsController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientsController::class, 'store'])->name('patients.store');

    // Verification for pending patients
    Route::get('/patients/verification', [PatientsController::class, 'verification'])->name('patients.verification');
    Route::post('/patients/verify', [PatientsController::class, 'verifyPatient'])->name('patients.verify');

    // Specific patient routes
    Route::get('/patients/{patient}/edit', [PatientsController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{patient}', [PatientsController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{patient}', [PatientsController::class, 'destroy'])->name('patients.destroy');
    Route::post('/patients/{patient}/assign', [PatientsController::class, 'assign'])->name('patients.assign');
    Route::get('/patients/{patient}', [PatientsController::class, 'show'])->name('patients.show');

    // Requests CRUD
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [RequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
    Route::get('/requests/{request}', [RequestController::class, 'show'])->name('requests.show');
    Route::get('/requests/{request}/edit', [RequestController::class, 'edit'])->name('requests.edit');
    Route::put('/requests/{request}', [RequestController::class, 'update'])->name('requests.update');
    Route::delete('/requests/{request}', [RequestController::class, 'destroy'])->name('requests.destroy');
    Route::post('/requests/{request}/assign', [RequestController::class, 'assign'])->name('requests.assign');

    // Doctor Routes
    Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');

    // Contact page
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.patients');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

    // Organisation & User settings
    Route::get('/organisation/settings', [OrganisationController::class, 'settings'])->name('organisation.settings');
    Route::post('/organisation/settings', [OrganisationController::class, 'update'])->name('organisation.settings.update');

    Route::get('/user/settings', [UserController::class, 'settings'])->name('user.settings');
    Route::post('/user/settings', [UserController::class, 'update'])->name('user.settings.update');
    Route::post('/user/settings/password', [UserController::class,'changePassword'])->name('user.settings.password');

    // Help & Guided Tour
    Route::get('/help', [HelpController::class,'index'])->name('help');
    Route::get('/guided-tour', [GuidedTourController::class, 'index'])->name('guided.tour');

    // Team
    Route::get('/invite-team', [TeamController::class, 'invite'])->name('invite.team');
    Route::post('/invite-team', [TeamController::class, 'submitInvite'])->name('invite.team.submit');

    // Bug report
    Route::get('/report-bug', function () {
        return view('report.bug');
    })->name('report.bug');
    Route::post('/report-bug', [BugReportController::class, 'submit'])->name('report.bug.submit');

    // Logout
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });
});


Route::resource('patients', PatientsController::class)->middleware(['auth', 'verified']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/patient/verification', [PatientVerificationController::class, 'index'])->name('patient.verify');
    Route::post('/patient/verification/send', [PatientVerificationController::class, 'sendVerification'])->name('patient.verify.send');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/patients/verification', [PatientVerificationController::class, 'index'])
        ->name('patient.verify');

    Route::post('/patients/verification', [PatientVerificationController::class, 'verify'])
        ->name('patient.verify.send');
});



Route::get('/patients/verification', [PatientVerificationController::class, 'index'])
    ->name('patients.verification'); // <- الاسم مهم


//     Route::get('/profile', function () {
//     return view('profile');
// })->middleware('auth')->name('profile.show');

Route::get('/messages', [App\Http\Controllers\ContactController::class, 'messages'])->name('messages.index');

Route::resource('patients', PatientsController::class);

Route::get('/patients/{id}/profile', [PatientsController::class, 'profile'])
    ->name('patient.profile')
    ->middleware('auth');


