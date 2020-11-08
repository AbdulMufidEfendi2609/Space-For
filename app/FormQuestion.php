<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $form_id
 * @property int $question_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Form $form
 * @property Question $question
 */
class FormQuestion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'form_question';

    /**
     * @var array
     */
    protected $fillable = ['form_id', 'question_id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo('App\Form');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
