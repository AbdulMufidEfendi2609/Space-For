<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function events()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
}
