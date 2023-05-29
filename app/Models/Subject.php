<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    
    use HasTranslations , SearchableTrait;

    public $translatable = ['name'];

    protected $fillable = ['name','grade_id','classroom_id','teacher_id'];


    
    protected $searchable = [

        'columns' => [
            'subjects.name' => 10,
        ],

    ];


    // جلب اسم المراحل الدراسية

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

    // جلب اسم الصفوف الدراسية
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }

    // جلب اسم المعلم
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }

    public function Exams()
    {
        return $this->hasMany(Exams::class, 'Subject_id');
    }

}
