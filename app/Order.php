<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table="orders";
    protected $guarded=[];

    public static function campaignFreeProductDetails($campaign_vendor_buy_product_id)
    {
        return DB::table('campaign_vendor_products')
                                    ->join('resturant_product', 'campaign_vendor_products.product_id', '=', 'resturant_product.product_id')
                                    ->join('resturant_variant', 'campaign_vendor_products.variant_id', '=', 'resturant_variant.variant_id')
                                    ->where('campaign_vendor_products.campaign_vendor_buy_product_id', $campaign_vendor_buy_product_id)
                                    ->select(
                                        'campaign_vendor_products.id',
                                        'resturant_product.product_name',
                                        'resturant_product.product_image',
                                        'resturant_product.product_image',
                                        'resturant_variant.quantity',
                                        'resturant_variant.unit',
                                        'resturant_variant.strick_price',
                                        'resturant_variant.discount_price_percentage',
                                        'resturant_variant.price',
                                    )->first();
    }
}
