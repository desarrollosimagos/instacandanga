<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class twitter extends Model
{
    protected $fillable = [
        'name', 'handle','twitter_id', 'avatar','user_id'
    ];
}
