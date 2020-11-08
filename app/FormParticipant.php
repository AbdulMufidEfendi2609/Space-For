<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_form
 * @property int $id_peserta
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Form $form
 * @property Pesertaschedule[] $pesertaschedules
 * @property Questionresponse[] $questionresponses
 */
class FormParticipant extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'formparticipant';

    /**
     * @var array
     */
    protected $fillable = ['id_form', 'id_peserta', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo('App\Form', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesertaschedules()
    {
        return $this->hasMany('App\Pesertaschedule', 'id_peserta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionresponses()
    {
        return $this->hasMany('App\Questionresponse', 'participant');
    }
}
