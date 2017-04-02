<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colectivos extends Model
{
    protected $table = 'colectivos';

    protected $fillable = [
        'name', 'avatar','user_id'
    ];
}
