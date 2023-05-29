<?php

namespace App\Models;

use App\Models\Exams;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model 
{

    use  HasTranslations , SearchableTrait;
    use HasFactory;
    public $translatable =  ['name' , 'notes'];
    protected $table = 'Grades';
    protected $fillable = ['name' , 'notes'];
    public $timestamps = true;
 

    protected $searchable = [

        'columns' => [
            'grades.name' => 10,
        ],

    ];
//علاقة المرحلة الدراسية لجلب الاقسام النتعلقة بكل مرحلة
public function Sections(){
    return $this->hasMany('App\Models\Section' , 'Grade_id');
}

public function grade(){
    return  $this->hasMany('App\Models\Fee' , 'Grade_id ');
}


public function classroom(){
   return $this->hasMany('App\Models\Fee' , 'Classroom_id ');
}

public function Exams(){
    return $this->hasMany(Exams::class , 'grade_id');
}

}