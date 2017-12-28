<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table = "agencies";

    protected $fillable = [
    	'name', 'time_zone', 'date', 'city', 'user_id',
	];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function generals()
    {
        return $this->hasMany('App\General');
    }
}
