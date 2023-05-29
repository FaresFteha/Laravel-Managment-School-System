<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded=[];
    public $timestamps = true;


    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات
    public function F_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'from_grade');
    }
    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات
    public function F_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'from_classroom');
    }
    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات
    public function F_section()
    {
        return $this->belongsTo('App\Models\Section', 'from_section');
    }


    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات
    public function T_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'to_grade');
    }
     // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات
    public function T_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'to_classroom');
    }
 // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات
    public function T_section()
    {
        return $this->belongsTo('App\Models\Section', 'to_section');
    }


}
