<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_user
 * @property string $name
 * @property string $address
 * @property string $website
 * @property string $email
 * @property string $no_hp
 * @property string $logo
 * @property string $bank_name
 * @property string $bank_account_name
 * @property string $bank_account_number
 * @property string $bank_brach
 * @property boolean $has_npwp
 * @property string $owner_name
 * @property string $owner_number
 * @property string $owner_proof
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property User $user
 */
class Organization extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'organization';

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'name', 'address', 'website', 'email', 'no_hp', 'logo', 'bank_name', 'bank_account_name', 'bank_account_number', 'bank_brach', 'has_npwp', 'owner_name', 'owner_number', 'owner_proof', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
