<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Quizze extends Model
{
    use  HasTranslations;
    public $translatable = ['name'];
    protected $table = 'quizzes';
    protected $guarded=[];
    public $timestamps = true;

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'Teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'Subject_id');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'Section_id');
    }
    public function degree()
    {
        return $this->hasMany('App\Models\Degree');
    }

}
