<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = "agreements";

    protected $fillable = [
    	'payment_agreement', 'product', 'commitment_date', 'promise_value', 'alternative', 'visit_id',
	];

	public function visit()
    {
        return $this->belongsTo('App\Visit');
    }

    public function commentaries()
    {
        return $this->hasMany('App\Commentary');
    }
}
