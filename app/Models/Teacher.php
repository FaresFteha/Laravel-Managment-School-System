<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Teacher extends Authenticatable
{
    use  HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];
    public $timestamps = true;

    public function genders(){
        return $this->belongsTo('App\Models\Gender' , 'Gender_id');
    }

    public function specializations(){
        return $this->belongsTo('App\Models\Specialization' , 'Specialization_id');
    }

    //علاقة المعلمين مع الاقسام
    public function Sections(){
        return $this->belongsToMany('App\Models\Section' , 'teacher__sections');
    }


}
