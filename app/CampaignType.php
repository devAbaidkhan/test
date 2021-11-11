<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignType extends Model
{
    protected $table="campaign_types";
    protected $guarded=[];
    public function scopeActive(){
        return $this->where('status',1);
    }
    
}
