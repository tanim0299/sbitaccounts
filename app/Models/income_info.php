<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class income_info extends Model
{
    protected $table = 'income_info';

    protected $fillable = ['date','income_title_id','recived_from','ammount','details'];
}
