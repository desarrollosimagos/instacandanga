<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class google extends Model
{
    protected $table = 'google';

    protected $fillable = [
        'name', 'handle','google_id', 'avatar','user_id'
    ];
}
