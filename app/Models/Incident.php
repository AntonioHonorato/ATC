<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Incident
 *
 * @property $id
 * @property $technical_id
 * @property $name
 * @property $address
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Technical $technical
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Incident extends Model
{
    
    static $rules = [
		'technical_id' => 'required',
		'name' => 'required',
		'address' => 'required',
		'description' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['technical_id','name','address','description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function technical()
    {
        return $this->hasOne('App\Models\Technical', 'id', 'technical_id');
    }
    

}
