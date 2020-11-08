<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_question
 * @property int $participant
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Question $question
 * @property Formparticipant $formparticipant
 */
class QuestionResponse extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'questionresponse';

    /**
     * @var array
     */
    protected $fillable = ['id_question', 'participant', 'value', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question', 'id_question');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formparticipant()
    {
        return $this->belongsTo('App\Formparticipant', 'participant');
    }
}
