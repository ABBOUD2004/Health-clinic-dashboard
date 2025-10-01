<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'patient_id',
        'dob',
        'indication',
        'status',
        'assigned_to',
        'notes',
    ];

    protected $casts = [
        'appointment_date' => 'date',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
      public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
