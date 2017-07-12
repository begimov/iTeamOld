<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'test_type_id',
        'name',
        'short_description',
        'description',
        'condition',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'price'
    ];
}
