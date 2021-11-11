<?php

use App\Http\Middleware\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission=[
            ['name'=>'notification-user','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now(),],
            ['name'=>'notification-store','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now(),],

            ['name'=>'create-delivery-boy','guard_name'=>'franchise-admin','created_at'=>now(), 'updated_at'=>now(),],
            ['name'=>'update-delivery-boy','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now(),],
            ['name'=>'delete-delivery-boy','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now(),],
            ['name'=>'view-delivery-boy-list','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now(),],
            ['name'=>'view-delivery-boy-tab','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-delivery-boy-commission','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'create-area','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-area','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-area','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-area-list','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-area-tab','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            
            ['name'=>'create-partner','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-partner','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-partner','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-partner-list','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'partner-secret-login','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-partner-tab','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'view-orders-list','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-orders-tab','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],

            // resturant
            ['name'=>'create-banner','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-banner','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-banner','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-banner-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-banner-tab','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'create-categories','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-categories','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-categories','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-categories-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-categories-tab','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'create-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            
            ['name'=>'create-varients-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-varients-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-varients-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-varients-product-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'create-addons-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-addons-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-addons-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-addons-product-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'view-product-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-product-tab','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'create-deal-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-deal-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-deal-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-deal-product-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-deal-product-tab','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'create-bulk-product','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'add-bulk-product-varients','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-bulk-product-tab','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
           
            ['name'=>'create-coupon','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'update-coupon','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'delete-coupon','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-coupon-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-coupon-tab','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'view-today-orders-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-completed-orders-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-admim-commission-list','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

            ['name'=>'create-delivery-time-slot','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'view-delivery-time-slot-tab','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],

        ];
        DB::table('permissions')->insert($permission);

        $roles=[
            ['name'=>'CountryFranchise','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'CityFranchise','guard_name'=>'franchise-admin','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Partner','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'OrderTaker','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Rider','guard_name'=>'partner','created_at'=>now(),'updated_at'=>now()],
        ];
        DB::table('roles')->insert($roles);
    }
}
