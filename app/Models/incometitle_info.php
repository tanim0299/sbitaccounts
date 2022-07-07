<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class incometitle_info extends Model
{
    use SoftDeletes;
    protected $table = 'incometitle_info';

    protected $fillable = ['sl','income_title','status','deleted_at'];
}
