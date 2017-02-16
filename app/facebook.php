<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facebook extends Model
{
    protected $table = 'facebook';

    protected $fillable = [
        'name', 'handle','facebook_id', 'avatar','user_id'
    ];
}
