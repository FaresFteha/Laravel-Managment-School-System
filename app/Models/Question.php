<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Question extends Model
{
    use SearchableTrait;
    protected $guarded=[];
    public $timestamps = true;

    protected $searchable = [

        'columns' => [
            'questions.title' => 10,
        ],

    ];

    public function quizze()
    {
        return $this->belongsTo('App\Models\Quizze' , 'quizze_id');
    }
}
