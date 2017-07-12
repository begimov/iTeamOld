<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'learn_id',
        'name',
        'company',
        'position',
        'message',
    ];

}
