<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_peserta
 * @property int $id_schedule
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Formparticipant $formparticipant
 * @property Schedule $schedule
 */
class PesertaSchedule extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pesertaschedule';

    /**
     * @var array
     */
    protected $fillable = ['id_peserta', 'id_schedule', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formparticipant()
    {
        return $this->belongsTo('App\Formparticipant', 'id_peserta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schedule()
    {
        return $this->belongsTo('App\Schedule', 'id_schedule');
    }
}
