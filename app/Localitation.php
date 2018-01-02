<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localitation extends Model
{
    protected $table = "localitations";

    protected $fillable = [
    	'breite', 'Lange', 'comentary_id',
	];

	public function firm()
    {
        return $this->belongsTo('App\Firm');
    }
}
