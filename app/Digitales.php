<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digitales extends Model
{
    protected $table = 'digitales';

    protected $fillable = [
        'user_id','colectivo_id'
    ];
}
