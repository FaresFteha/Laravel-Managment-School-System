<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Attendance extends Model
{
    use SearchableTrait;
    protected $guarded=[];
    public $timestamps = true;

    
    protected $searchable = [

        'columns' => [
            'attendances.name' => 10,
        ],

    ];

    public function Sections()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function Students()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

 

}
