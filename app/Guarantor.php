<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    protected $table = "references";

    protected $fillable = [
    	'guarantee_code', 'name_lastname_guarantee', 'guarantee_phone', 'ocupation', 'observation', 'reference_id',
	];

	public function reference()
    {
        return $this->belongsTo('App\Reference');
    }

    public function visits()
    {
        return $this->hasMany('App\Visit');
    }
}
