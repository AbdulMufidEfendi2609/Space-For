<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_event
 * @property string $s_time
 * @property string $f_time
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Event $event
 * @property Pesertaschedule[] $pesertaschedules
 */
class Schedule extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'schedule';

    /**
     * @var array
     */
    protected $fillable = ['id_event', 's_time', 'f_time', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'id_event');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesertaschedules()
    {
        return $this->hasMany('App\Pesertaschedule', 'id_schedule');
    }
}
