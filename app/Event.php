<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_category
 * @property int $id_organization
 * @property string $package
 * @property int $limit_peserta
 * @property int $limit_sertifikat
 * @property string $link_room
 * @property string $event_name
 * @property string $event_desc
 * @property string $slug
 * @property string $email_cp
 * @property string $poster
 * @property boolean $is_private
 * @property string $location
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Category $category
 * @property Form[] $forms
 * @property Schedule[] $schedules
 */
class Event extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'event';

    /**
     * @var array
     */
    protected $fillable = ['id_category', 'id_organization', 'package', 'limit_peserta', 'limit_sertifikat', 'link_room', 'event_name', 'event_desc', 'slug', 'email_cp', 'poster', 'is_private', 'location', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'id_category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forms()
    {
        return $this->hasMany('App\Form', 'id_event');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule', 'id_event');
    }
}
