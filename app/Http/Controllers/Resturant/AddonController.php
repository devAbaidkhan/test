<?php

namespace App\Http\Controllers\Resturant;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class AddonController extends Controller
{
    public function addon(Request $request)
    {
        $id = $request->id;
        $p= DB::table('product')
                 ->where('product_id', $id)
                ->first();
         
         
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
         
        $product= DB::table('restaurant_product_addons')
        ->join('restaurant_addons', 'restaurant_product_addons.addon_id', '=', 'restaurant_addons.addon_id')
                 ->where('restaurant_product_addons.product_id', $id)
                 ->where('restaurant_product_addons.vendor_id', $vendor->vendor_id)
                 ->select('restaurant_product_addons.id', 'restaurant_addons.addon_name', 'restaurant_addons.addon_price')
                ->get();
        return view('resturant.product.addon.show_addon', compact("vendor_email", "product", "vendor", "id"));
    }
    
    public function Addproductaddon(Request $request)
    {
        $id = $request->id;
        $product= DB::table('resturant_product')
                 ->where('product_id', $id)
                ->first();
         
         
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        
        $restaurant_addons= DB::table('restaurant_addons')
        ->where('vendor_id', $vendor->vendor_id)
                ->get();
  
        return view('resturant.product.addon.addaddon', compact("vendor_email", "vendor", "product", "restaurant_addons"));
    }
    
    
    public function AddNewproductaddon(Request $request)
    {
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $vendor_id=$vendor->vendor_id;
         
        $product_id = $request->id;

          
        $this->validate(
            $request,
            [
                    'addon_id'=>'required',
                ],
            [
                    'addon_id.required'=>'Select Addon',
                ]
        );
                
        $data=array();
        if (count($request->addon_id)>0) {
            for ($i=0; $i <count($request->addon_id); $i++) {


                $exists=  DB::table('restaurant_product_addons')->where('addon_id', $request->addon_id[$i])->where('product_id', $product_id)
                ->where('vendor_id', $vendor_id)->exists();


                if (!$exists) {
                    $data[]=[
                    'product_id'=>$product_id,
                    'addon_id'=>$request->addon_id[$i],
                    'vendor_id'=>$vendor_id];
                }
            }
        }
        
        $insert =  DB::table('restaurant_product_addons')
                        ->insert($data);
        if ($insert) {
            return redirect()->route('resturantaddon', $product_id)->withErrors('Successfully Added');
        } else {
            return redirect()->back()->withErrors('something went wrong');
        }
    }
    
    public function Editproductaddon(Request $request)
    {
        $restaurant_product_addons_id=$request->id;
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
         
        $restaurant_product_addon= DB::table('restaurant_product_addons')
                 ->where('id', $restaurant_product_addons_id)
                ->first();
                  
        $restaurant_addons= DB::table('restaurant_addons')
                ->where('vendor_id', $vendor->vendor_id)
                        ->get();
        return view('resturant.product.addon.Editaddon', compact("vendor_email", "vendor", "restaurant_addons", "restaurant_product_addon"));
    }
    public function Updateproductaddon(Request $request)
    {
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $vendor_id=$vendor->vendor_id;
         
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
       $exists= DB::table('restaurant_product_addons')
                            ->where('id','!=', $request->id)
                            ->where('addon_id',$request->addon_id)
                            ->where('vendor_id',$vendor_id)
                            ->where('product_id',$request->product_id)
                            ->exists();
                            if(!$exists)
                            {
                                $varient_update = DB::table('restaurant_product_addons')
                            ->where('id', $request->id)
                            ->update([
                            'addon_id'=>$request->addon_id]);
                            if ($varient_update) {
                                return redirect()->route('resturantaddon', $request->product_id)->withErrors('Updated Successfully');
                            } else {
                                return redirect()->back()->withErrors("Something Wents Wrong.");
                            }
                            }else{
                                return redirect()->back()->withErrors("Addon Already Exists.");
                            }
        

        
    }
    public function deleteproductaddon(Request $request)
    {
        $addon_id=$request->id;

        $delete=DB::table('restaurant_addons')->where('addon_id', $request->id)->delete();
        if ($delete) {
            return redirect()->back()->withErrors('Deleted Successfully');
        } else {
            return redirect()->back()->withErrors('Unsuccessfull Delete');
        }
    }
}
