<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    protected $fillable = [
        'title', 'sub_title', 'big_img', 'small_img','description','client','category'
    ];
}
