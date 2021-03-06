<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    protected $table = "commentaries";

    protected $fillable = [
    	'commentary', 'visit_effect', 'inaccessible_place', 'another_reason', 'non_existent_address', 'Subrogation', 'type_of_contact', 'agreement_id',
	];

	public function agreement()
    {
        return $this->belongsTo('App\Agreement');
    }

    public function firms()
    {
        return $this->hasMany('App\Firm');
    }
}
