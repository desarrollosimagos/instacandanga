<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class instagram extends Model
{
    protected $table = 'instagram';

    protected $fillable = [
        'name', 'handle','instagram_id', 'avatar'
    ];
}
