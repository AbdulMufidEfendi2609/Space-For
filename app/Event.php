<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
  protected $table = 'event';
  protected $fillable = [
    'event_name', 'user_id', 'deskripsi', 'start_date', 'start_time', 'end_date', 'end_time', 'lokasi', 'image', 'kategori', 'event_privacy', 'package', 'link', 'email_contact', 'status', 'price', 'status', 'limit_participant'
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function participants()
  {
    return $this->hasMany('App\Participant', 'user_id');
  }

  public function getImageUrlAttribute()
  {
    if (!$this->attributes['image']) {
      return null;
    }

    return Storage::url($this->attributes['image']);
  }
}
