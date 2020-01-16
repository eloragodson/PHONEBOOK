<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Contact
 * @package App\Models
 * @version December 20, 2019, 9:20 am UTC
 *
 * @property string nom
 * @property string prenom
 * @property string numero
 */
class Contact extends Model
{

    public $table = 'contacts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nom',
        'prenom',
        'numero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'numero' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'numero' => 'required'
    ];

    
}
