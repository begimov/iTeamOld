<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkResource extends Model
{
    protected $table = 'marks_resource';

    public function mark()
    {
        return $this->belongsTo('App\Mark', 'id_mark', 'id');
    }

    public function article()
    {
        return $this->belongsTo('App\Models\Articles', 'id_resource', 'id');
    }

    public function news()
    {
        return $this->belongsTo('App\Models\News', 'id_resource', 'id');
    }

    public function learn()
    {
        return $this->belongsTo('App\Models\Learn', 'id_resource', 'id');
    }

}
