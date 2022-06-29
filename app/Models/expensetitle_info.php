<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expensetitle_info extends Model
{
    protected $table = 'expensetitle_info';

    protected $fillable = ['sl','expense_title','status','admin_id'];
}
