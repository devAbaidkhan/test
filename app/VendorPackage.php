<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorPackage extends Model
{
    public function package_detail(){
        return $this->belongsTo(Package::class,'package_id','id');
    }
}
