<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = "agencies";

    protected $fillable = [
    	'relief_code', 'obligation_n', 'disbursement_date', 'capital_balance', 'total_balance', 'sapro_stage', 'inv_inic_goods', 'embargo', 'agency_id',
	];

	public function agency()
    {
        return $this->belongsTo('App\Agency');
    }

    public function generals()
    {
        return $this->hasMany('App\General');
    }
}
