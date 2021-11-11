<?php

namespace App\Http\Controllers\Resturant;

use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CampaignController extends Controller
{
    public function index()
    {
        check_vendor();
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $cityadmin= DB::table('cityadmin')->where('cityadmin_id', $vendor->cityadmin_id)->first();
        $city=$cityadmin->city;
        $campaigns=  Campaign::whereHas('campaignCities', function ($q) use ($city) {
            $q->where('city', $city);
        })->orderBy('id', 'desc')->paginate(5);

        return view('resturant.campaign.index', compact('vendor_email', 'vendor', 'campaigns'));
    }
    public function joinCampaign(Campaign $campaign)
    {
        check_vendor();
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $resturant_category=DB::table('resturant_category')
        ->where('vendor_id', $vendor->vendor_id)
        ->get();
        return view('resturant.campaign.join', get_defined_vars());
    }
    public function getCategoryProducts(Request $request)
    {
        check_vendor();
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();

        $resturant_product=  DB::table('resturant_product')
        ->where('subcat_id', $request->category_id)
        ->where('vendor_id', $vendor->vendor_id)
        ->select('product_id', 'product_name')
        ->get();
        return response()->json($resturant_product);
    }
    public function getProductVarients(Request $request)
    {
        check_vendor();
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();

        $resturant_variant=  DB::table('resturant_variant')
        ->where('product_id', $request->product_id)
        ->where('vendor_id', $vendor->vendor_id)
        ->select('variant_id', 'quantity', 'unit')
        ->get();
        return response()->json($resturant_variant);
    }
    public function storeJoinCampaign(Request $request)
    {
        check_vendor();


        if ($request->campaign_type_id==1) {
            $this->validate($request, [
                'campaign_id' => 'required',
                'buy_product_id.*' => 'required',
                'free_product_id.*' => 'required',
                'buy_varient_id.*' => 'required',
                'free_varient_id.*' => 'required',
            ]);
            $status=  $this->buy_1_get_1_free($request);
            if ($status=='empty') {
                return redirect()->route('restaurant.campaign.join', ['campaign'=>$request->campaign_id])->withErrors('Please Enter Both Product And Discount of Products');
            } elseif ($status=='success') {
                return redirect()->route('restaurant.campaign.join', ['campaign'=>$request->campaign_id])->withErrors('Successfully Joined');
            }
        } elseif ($request->campaign_type_id==2 || $request->campaign_type_id==3) {
            $this->validate($request, [
                'campaign_id' => 'required',
                'product_id.*' => 'required',
                'discount.*' => 'required',
            ]);

            $status=  $this->campaign_type_1_and_2($request);

            if ($status=='duplicate') {
                return redirect()->route('restaurant.campaign.join', ['campaign'=>$request->campaign_id])->withErrors('Duplicates Products');
            } elseif ($status=='empty') {
                return redirect()->route('restaurant.campaign.join', ['campaign'=>$request->campaign_id])->withErrors('Please Enter Both Product And Discount of Products');
            } elseif ($status=='success') {
                return redirect()->route('restaurant.campaign.join', ['campaign'=>$request->campaign_id])->withErrors('Successfully Joined');
            }
        }
    }

    protected function buy_1_get_1_free($request, $status=null)
    {
        
        if (count($request->buy_category_id)!=count($request->free_category_id) || count($request->buy_product_id)!=count($request->free_product_id)  || count($request->buy_varient_id)!=count($request->free_varient_id)) {
            return "empty";
            exit;
        }
        $dups = array();
        foreach (array_count_values($request->buy_varient_id) as $val => $c) {
            if ($c > 1) {
                $dups[] = $val;
            }
        }

        if (count($dups)>0) {
            return "duplicate";
            exit;
        }
        $dups1 = array();
        foreach (array_count_values($request->free_varient_id) as $val => $c) {
            if ($c > 1) {
                $dups1[] = $val;
            }
        }

        if (count($dups1)>0) {
            return "duplicate";
            exit;
        }
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();

        $campaign_vendor_exists=  DB::table('campaign_vendor')->where('vendor_id', $vendor->vendor_id)
        ->where('campaign_type_id', $request->campaign_type_id)->first();
        if ($campaign_vendor_exists) {
            $campaign_vendor=$campaign_vendor_exists->id;
        } else {
            $campaign_vendor=  DB::table('campaign_vendor')
            ->insertGetId([
                'campaign_id'=>$request->campaign_id,
                'vendor_id'=>$vendor->vendor_id,
                'campaign_type_id'=>$request->campaign_type_id,
                'status'=>1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }

        /* First Delete Old Products in campaign_vendor_products */
        if ($status=='edit') {
            DB::table('campaign_vendor_products')->where('campaign_vendor_id', $campaign_vendor)->delete();
        }
        /* end */
        $data=array();
        for ($i=0; $i <count($request->buy_product_id) ; $i++) {
            $count_buy_duplicate=   DB::table('campaign_vendor')
            ->join('campaign_vendor_products', 'campaign_vendor.id', '=', 'campaign_vendor_products.campaign_vendor_id')
            ->where('campaign_vendor.campaign_id', $request->campaign_id)
            ->where('campaign_vendor_products.product_id', $request->buy_product_id[$i])
            ->where('campaign_vendor_products.variant_id', $request->buy_varient_id[$i])
            ->where('campaign_vendor_products.product_type', 'buy')
            ->count();
            if ($count_buy_duplicate==0) {
                $campaign_vendor_buy_product=DB::table('campaign_vendor_products')
                ->insertGetId([
                'campaign_vendor_id'=>$campaign_vendor,
                'category_id'=>$request->buy_category_id[$i],
                'product_id'=>$request->buy_product_id[$i],
                'variant_id'=>$request->buy_varient_id[$i],
                'discount'=>null,
                'product_type'=>'buy',
                'campaign_vendor_buy_product_id'=>null,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);

                DB::table('campaign_vendor_products')
                ->insert([
                'campaign_vendor_id'=>$campaign_vendor,
                'category_id'=>$request->free_category_id[$i],
                'product_id'=>$request->free_product_id[$i],
                'variant_id'=>$request->free_varient_id[$i],
                'discount'=>null,
                'product_type'=>'free',
                'campaign_vendor_buy_product_id'=>$campaign_vendor_buy_product,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),

            ]);
                $data[]= $campaign_vendor_buy_product;
            }
        }
        if (count($data)==0) {
            DB::table('campaign_vendor')->where('id', $campaign_vendor)
            ->delete();
        }
        return "success";
    }
    protected function campaign_type_1_and_2($request, $status=null)
    {
        if(!$request->product_id){
            return "empty";
            exit;
        }
        $dups = array();
        foreach (array_count_values($request->product_id) as $val => $c) {
            if ($c > 1) {
                $dups[] = $val;
            }
        }

        if (count($dups)>0) {
            return "duplicate";
            exit;
        }

        if (count($request->product_id)!=count($request->discount)) {
            return "empty";
            exit;
        }
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();

        $campaign_vendor_exists=  DB::table('campaign_vendor')->where('vendor_id', $vendor->vendor_id)
        ->where('campaign_type_id', $request->campaign_type_id)->first();
        if ($campaign_vendor_exists) {
            $campaign_vendor=$campaign_vendor_exists->id;
        } else {
            $campaign_vendor=  DB::table('campaign_vendor')
            ->insertGetId([
                'campaign_id'=>$request->campaign_id,
                'vendor_id'=>$vendor->vendor_id,
                'campaign_type_id'=>$request->campaign_type_id,
                'status'=>1,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
        /* First Delete Old Products in campaign_vendor_products */
        if ($status=='edit') {
            DB::table('campaign_vendor_products')->where('campaign_vendor_id', $campaign_vendor)->delete();
        }
        /* end */
        $data=array();
        for ($i=0; $i <count($request->product_id) ; $i++) {
            $count_duplicate=   DB::table('campaign_vendor')
            ->join('campaign_vendor_products', 'campaign_vendor.id', '=', 'campaign_vendor_products.campaign_vendor_id')
            ->where('campaign_vendor.campaign_id', $request->campaign_id)
            ->where('campaign_vendor_products.product_id', $request->product_id[$i])
            ->count();
            if ($count_duplicate==0) {
                $data[]=DB::table('campaign_vendor_products')
                ->insertGetId([
                    'campaign_vendor_id'=>$campaign_vendor,
                    'category_id'=>$request->category_id[$i],
                    'product_id'=>$request->product_id[$i],
                    'variant_id'=>null,
                    'discount'=>$request->discount[$i],
                    'product_type'=>'buy',
                    'campaign_vendor_buy_product_id'=>null,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]);
            }
        }

        if (count($data)==0) {
            DB::table('campaign_vendor')->where('id', $campaign_vendor)
            ->delete();
        }
        return "success";
    }
    public function joinedCampaignIndex($campaign)
    {
        check_vendor();
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $resturant_category=DB::table('resturant_category')
        ->where('vendor_id', $vendor->vendor_id)
        ->get();
        $campaign=  Campaign::find(base64_url_decode($campaign));
        $campaign_vendor=Campaign::JoinedCampaignDetails($campaign->id, $vendor->vendor_id);
        //dd($campaign_vendor);
        return view('resturant.campaign.update_joined', get_defined_vars());
    }
    public function updateJoinedCampaign(Request $request)
    {
        check_vendor();


        if ($request->campaign_type_id==1) {
            $this->validate($request, [
                'campaign_id' => 'required',
                'buy_product_id.*' => 'required',
                'free_product_id.*' => 'required',
                'buy_varient_id.*' => 'required',
                'free_varient_id.*' => 'required',
            ]);
            $status=  $this->buy_1_get_1_free($request, 'edit');
            if ($status=='empty') {
                return redirect()->route('restaurant.campaign.joined.edit', ['campaign_id'=>base64_url_encode($request->campaign_id)])->withErrors('Please Enter Both Product And Discount of Products');
            } elseif ($status=='success') {
                return redirect()->route('restaurant.campaign.joined.edit', ['campaign_id'=>base64_url_encode($request->campaign_id)])->withErrors('Successfully Joined');
            }
        } elseif ($request->campaign_type_id==2 || $request->campaign_type_id==3) {
            $this->validate($request, [
                'campaign_id' => 'required',
                'product_id.*' => 'required',
                'discount.*' => 'required',
            ]);

            $status=  $this->campaign_type_1_and_2($request, 'edit');

            if ($status=='duplicate') {
                return redirect()->route('restaurant.campaign.joined.edit', ['campaign_id'=>base64_url_encode($request->campaign_id)])->withErrors('Duplicates Products');
            } elseif ($status=='empty') {
                return redirect()->route('restaurant.campaign.joined.edit', ['campaign_id'=>base64_url_encode($request->campaign_id)])->withErrors('Please Enter Both Product And Discount of Products');
            } elseif ($status=='success') {
                return redirect()->route('restaurant.campaign.joined.edit', ['campaign_id'=>base64_url_encode($request->campaign_id)])->withErrors('Successfully Updated');
            }
        }
    }
}
