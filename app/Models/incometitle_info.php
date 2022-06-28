<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incometitle_info extends Model
{
    protected $table = 'incometitle_info';

    protected $fillable = ['sl','income_title','status'];
}
