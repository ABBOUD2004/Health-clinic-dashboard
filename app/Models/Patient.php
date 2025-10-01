<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients'; // اسم الجدول
    protected $primaryKey = 'patient_id'; // المفتاح الأساسي
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'patient_name',
        'age',
        'disease',
        'doctor_id',
        'appointment_date',
    ];

    protected $casts = [
        'appointment_date' => 'date',
    ];

    // العلاقة مع الدكتور
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
