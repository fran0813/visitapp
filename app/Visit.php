<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = "visits";

    protected $fillable = [
    	'contact_owner', 'no_Contact_owner', 'name_lastname_visit', 'relationship', 'economic_activity', 'reason_not_payment', 'observations_not_payment', 'guarantor_id',
	];

	public function guarantor()
    {
        return $this->belongsTo('App\Guarantor');
    }

    public function agreements()
    {
        return $this->hasMany('App\Agreement');
    }
}
