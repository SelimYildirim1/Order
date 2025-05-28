<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class configs extends Model
{
    protected $table = "configs";
    protected $fillable = [
        'logo',
        'icon',
        'adress',
        'mail',
        'phone',
        'start',
        'finish',
    ];
}
