<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentImage extends Model
{
    protected $table = 'student_images';
    protected $fillable=[ 'file_name' , 'student_id'];
    public $timestamps = true;
}

