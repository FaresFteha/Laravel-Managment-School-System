<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Section extends Model 
{
    use  HasTranslations;
    public $translatable = ['name_sections'];
    protected $table = 'Sections';
    protected $fillable=[ 'name_sections' , 'Grade_id' , 'classroom_id'] ;
    public $timestamps = true;


    public function Classrooms()
    {
        return $this->belongsTo('App\Models\Classroom' , 'classroom_id');
    }

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade' , 'Grade_id');
    }


       //علاقة الاقسام مع المعلمين
       public function Teachers(){
        return $this->belongsToMany('App\Models\Teacher' , 'teacher__sections');
    }

}