<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignCity extends Model
{
    protected $table="campaign_cities";
    protected $guarded=[];

    public function compaigns(){
        return $this->belongsTo(Campaign::class,'campaign_id');
    }
}
