<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaregeMark extends Model
{
    protected $guarded=[];
    public $timestamps = true;
    
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'Student_id');
    }
    
}
