<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;
use Spatie\Translatable\HasTranslations;

class Exams extends Model
{
    use  HasTranslations;

    public $translatable = ['day_exam'];
    protected $table = 'exams';
    protected $guarded=[];
    public $timestamps = true;

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'Subject_id');
    }


    
}
