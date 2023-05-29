<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Student extends Authenticatable
{
    use SoftDeletes , SearchableTrait;
    use  HasTranslations;
    public $translatable = ['name'];
    //protected $fillable=['name'];
    protected $guarded=[];
    public $timestamps = true;



    protected $searchable = [

        'columns' => [
            'students.name' => 10,
        ],

    ];

    // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
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
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    // علاقة بين الطلاب و االصور لجلب اسم الصور  في جدول الطلاب
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }


    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_id');
    }

     public function myparent()
    {
        return $this->belongsTo('App\Models\myparent', 'parent_id');
    }

 
    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAcounnt', 'student_id');
    }

    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }

   

}
