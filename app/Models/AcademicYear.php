<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = true;
    
    public function academicyears()
    {
        return $this->hasMany(StudentAverage::class, 'Academic_id');
    }
}
