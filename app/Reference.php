<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = "references";

    protected $fillable = [
    	'names_lastnames_reference', 'reference_phone', 'client_id',
	];

	public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function guarantors()
    {
        return $this->hasMany('App\Guarantor');
    }
}
