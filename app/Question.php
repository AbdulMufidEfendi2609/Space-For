<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $text
 * @property string $option
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property FormQuestion[] $formQuestions
 * @property Questionresponse[] $questionresponses
 */
class Question extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'question';

    /**
     * @var array
     */
    protected $fillable = ['type', 'text', 'option', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formQuestions()
    {
        return $this->hasMany('App\FormQuestion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionresponses()
    {
        return $this->hasMany('App\Questionresponse', 'id_question');
    }
}
