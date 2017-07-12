<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories_learn';
    
    protected $fillable = [
        'name',
        'slug'
    ];
}
