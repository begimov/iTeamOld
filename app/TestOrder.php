<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestOrder extends Model
{
    protected $fillable = [
        'user_id',
        'test_id',
        'sum'
    ];
}
