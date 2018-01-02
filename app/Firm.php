<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    protected $table = "firms";

    protected $fillable = [
    	'firm', 'comentary_id',
	];

	public function comentary()
    {
        return $this->belongsTo('App\Comentary');
    }

    public function localitations()
    {
        return $this->hasMany('App\Localitation');
    }
}
