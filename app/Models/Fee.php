<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use  HasTranslations;
    public $translatable = ['title'];
    protected $fillable=['title','amount','Grade_id','Classroom_id','year','description','Fee_type'];
    public $timestamps = true;

     // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

     public function grade()
     {
         return $this->belongsTo('App\Models\Grade', 'Grade_id');
     }

    public function Classrooms()
    {
        return $this->belongsTo('App\Models\Classroom' , 'Classroom_id');
    }
}
