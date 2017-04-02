<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'cedula', 'name','phone','user_id'
    ];
}
