<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{     protected $table = 'parent_attachments';
    protected $fillable=[ 'file_name' , 'myparent_id'];
    public $timestamps = true;
}
