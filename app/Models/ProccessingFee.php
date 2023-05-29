<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ProccessingFee extends Model
{
    use SearchableTrait;
        protected $guarded=[];
        public $timestamps = true;


        protected $searchable = [
            'columns' => [
            'proccessing_fees.student_id' => 10,
            ],
        ];
    
        public function student()
        {
            return $this->belongsTo('App\Models\Student', 'student_id');
        }
}
