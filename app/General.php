<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $table = "agencies";

    protected $fillable = [
    	'relief_code', 'obligation_n', 'disbursement_date', 'capital_balance', 'total_balance', 'day_past_due', 'interest_value_arrear', 'current_interest_value', 'safe_value', 'gac_value', 'qualification', 'sapro_stage', 'inv_inic_good', 'embargo', 'agency_id',
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
