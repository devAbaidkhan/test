<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Campaign extends Model
{
    protected $table="campaigns";
    protected $guarded=[];
    public function campaignCities()
    {
        return $this->hasMany(CampaignCity::class, 'campaign_id', 'id');
    }
    public static function checkCampaignJoined($campaign_id, $vendor_id)
    {
        return  DB::table('campaign_vendor')
        ->where('campaign_id', $campaign_id)
        ->where('vendor_id', $vendor_id)->exists();
    }
    public static function JoinedCampaignDetails($campaign_id, $vendor_id)
    {
        return  DB::table('campaign_vendor')
        ->join('campaign_vendor_products','campaign_vendor.id','=','campaign_vendor_products.campaign_vendor_id')
        ->where('campaign_vendor.campaign_id', $campaign_id)
        ->where('campaign_vendor.vendor_id', $vendor_id)->get();
    }
    public static function joinedProductDetails($product_id){
        return DB::table('resturant_product')
        ->where('product_id',$product_id)->first();
    }
    public static function resturant_category($resturant_cat_id){
        return DB::table('resturant_category')
        ->where('resturant_cat_id',$resturant_cat_id)->first();
    }
    public static function freeProduct($campaign_vendor_product_id)
    {
        return  DB::table('campaign_vendor_products')
        ->join('resturant_product','campaign_vendor_products.product_id','=','resturant_product.product_id')
        ->where('campaign_vendor_products.campaign_vendor_buy_product_id', $campaign_vendor_product_id)->first();
    }
    public static function freeCategory($campaign_vendor_product_id)
    {
        return  DB::table('campaign_vendor_products')
        ->join('resturant_category','campaign_vendor_products.category_id','=','resturant_category.resturant_cat_id')
        ->where('campaign_vendor_products.campaign_vendor_buy_product_id', $campaign_vendor_product_id)->first();
    }
    public static function freeVarient($campaign_vendor_product_id)
    {
        return  DB::table('campaign_vendor_products')
        ->join('resturant_variant','campaign_vendor_products.variant_id','=','resturant_variant.variant_id')
        ->where('campaign_vendor_products.campaign_vendor_buy_product_id', $campaign_vendor_product_id)->select('resturant_variant.*')->first();
    }
    public static function buyVarient($variant_id)
    {
        return  DB::table('resturant_variant')
        ->where('variant_id', $variant_id)->first();
    }
}