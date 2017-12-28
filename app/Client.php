<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";

    protected $fillable = [
    	'names_lastnames', 'identification_document', 'email', 'cell_phone', 'residence_address', 'residence_phone', 'business_address', 'office_phone', 'most_contact_address', 'address_of_visit', 'general_id',
	];

	public function general()
    {
        return $this->belongsTo('App\General');
    }

    public function references()
    {
        return $this->hasMany('App\Reference');
    }
}
