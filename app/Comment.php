<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commendable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
