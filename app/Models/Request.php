<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    // اسم الجدول في قاعدة البيانات
    protected $table = 'requests';

    // الأعمدة المسموح بالـ mass assignment عليها
    protected $fillable = [
        'patient_name',
        'dob',
        'indication',
        'status',
        'doctor_id',
        'assigned_to',
    ];

    // الحقول اللي تعتبر تواريخ
    protected $dates = ['dob', 'created_at', 'updated_at'];

    // العلاقة مع الأطباء
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
