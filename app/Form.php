<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_event
 * @property string $token
 * @property string $type
 * @property string $name
 * @property string $desc
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Event $event
 * @property FormQuestion[] $formQuestions
 * @property Formparticipant $formparticipant
 */
class Form extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'form';

    /**
     * @var array
     */
    protected $fillable = ['id_event', 'token', 'type', 'name', 'desc', 'created_at', 'updated_at', 'deleted_at'];

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
    public function formQuestions()
    {
        return $this->hasMany('App\FormQuestion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formparticipant()
    {
        return $this->hasOne('App\Formparticipant', 'id');
    }
}
