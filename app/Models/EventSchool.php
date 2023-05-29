<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventSchool extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['name_event'];
    protected $table = 'event_schools';
    protected $guarded=[];
    public $timestamps = true;
}
