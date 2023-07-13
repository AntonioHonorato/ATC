<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Technical
 *
 * @property $id
 * @property $active
 * @property $name
 * @property $phone
 * @property $created_at
 * @property $updated_at
 *
 * @property Incident[] $incidents
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Technical extends Model
{
    
    static $rules = [
		'active' => 'required',
		'name' => 'required',
		'phone' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['active','name','phone'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incidents()
    {
        return $this->hasMany('App\Models\Incident', 'technical_id', 'id');
    }
    

}
