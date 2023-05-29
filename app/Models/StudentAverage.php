<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAverage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'Student_id');
    }
    
    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
    
       // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

       public function classroom()
       {
           return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
       }
   
       // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب
   
       public function section()
       {
           return $this->belongsTo('App\Models\Section', 'Section_id');
       }

       
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'Subject_id');
    }

    public function academicyear()
    {
        return $this->belongsTo(AcademicYear::class, 'Academic_id');
    }


}
