<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_info extends Model
{
    protected $table = 'course_infos';

    protected $fillable = ['sl','course_name','course_fee','status'];
}
