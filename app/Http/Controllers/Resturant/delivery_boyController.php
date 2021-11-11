<?php

namespace App\Http\Controllers\Resturant;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class delivery_boyController extends Controller
{
    public function resturantdelivery_boy(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            $delivery_boy= DB::table('delivery_boy')
        ->where('vendor_id', $vendor->vendor_id)
        ->paginate(10);
            return view('resturant.delivery_boy.delivery_boy', compact("vendor_email", "delivery_boy", "vendor"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    public function resturantAdddelivery_boy(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();

        
            return view('resturant.delivery_boy.adddelivery_boy', compact("vendor_email", "vendor"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    
    public function resturantAddNewdelivery_boy(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            $delivery_boy_id=$request->id;
           
            $vendor_id=$vendor->vendor_id;
            $delivery_boy_name=$request->delivery_boy_name;
            $delivery_boy_phone=$request->delivery_boy_phone;
           
            $password=$request->password1;
            $password2=$request->password2;
            $old_delivery_boy_image=$request->old_delivery_boy_image;
            $date = date('d-m-Y');
            $created_at=date('d-m-Y h:i a');
            $delivery_boy_image=null;
            if($request->hasFile('delivery_boy_image'))
            {
              $delivery_boy_image = $request->delivery_boy_image;
              $fileName = date('dmyhisa').'-'.$delivery_boy_image->getClientOriginalName();
              $fileName = str_replace(" ", "-", $fileName);
              $delivery_boy_image->move('delivery_boy_img/images/'.$date.'/', $fileName);
              $delivery_boy_image = 'delivery_boy_img/images/'.$date.'/'.$fileName;
            }
            
      
     
            if ($password!=$password2) {
                return redirect()->back()->withErrors('password are not same');
            } else {
                $new_pass=Hash::make($password);
                $insert = DB::table('delivery_boy')
                ->insertGetId(['vendor_id'=>$vendor_id,'delivery_boy_name'=>$delivery_boy_name,'delivery_boy_image'=>$delivery_boy_image,
                'delivery_boy_phone'=> $delivery_boy_phone,
                'delivery_boy_pass'=>$new_pass,
                'created_at'=>$created_at]);
            if($insert){
              return redirect()->route('resturantdelivery_boy')->withErrors('successfully Created');
            }else{
              return redirect()->route('resturantdelivery_boy')->withErrors('not  Created');
            }
                
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
  
  
  
    public function resturantEditdelivery_boy(Request $request)
    {
        if (Session::has('vendor')) {
            $delivery_boy_id=$request->id;
            $vendor_email=Session::get('vendor');
    
            $vendor=DB::table('vendor')
                ->where('vendor_email', $vendor_email)
                ->first();
            $delivery_boy= DB::table('delivery_boy')
                  ->where('delivery_boy_id', $delivery_boy_id)
                  ->first();
            
           
                
            return view('resturant.delivery_boy.Editdelivery_boy', compact("vendor_email", "vendor", "delivery_boy_id", "delivery_boy"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function resturantUpdatedelivery_boy(Request $request)
    {
        if (Session::has('vendor')) {
           
            $delivery_boy_id=$request->id;
            $delivery_boy_name=$request->delivery_boy_name;
            $delivery_boy_phone=$request->delivery_boy_phone;
            $password=$request->password1;
            $password2=$request->password2;
          
            $old_delivery_boy_image=$request->old_delivery_boy_image;
            $date = date('d-m-Y');
            $updated_at = date("d-m-y h:i a");
            $date=date('d-m-y');
        

            $getImage = DB::table('delivery_boy')
                     ->where('delivery_boy_id', $delivery_boy_id)
                    ->first();

            $image = $getImage->delivery_boy_image;
      
            if ($password!=$password2) {
                return redirect()->back()->withErrors('password are not same');
            } else {
                if ($request->hasFile('delivery_boy_image')) {
                    if (file_exists($image)) {
                        unlink($image);
                    }
                    $delivery_boy_image = $request->delivery_boy_image;
                    $fileName = date('dmyhisa').'-'.$delivery_boy_image->getClientOriginalName();
                    $fileName = str_replace(" ", "-", $fileName);
                    $delivery_boy_image->move('delivery_boy_img/images/'.$date.'/', $fileName);
                    $delivery_boy_image = 'delivery_boy_img/images/'.$date.'/'.$fileName;
                } else {
                    $delivery_boy_image = $old_delivery_boy_image;
                }
        
                if ($password!="" && $password2!="") {
                    if ($password!=$password2) {
                        return redirect()->back()->withErrors('password are not same');
                    } else {
                        $new_pass=Hash::make($password);
                        $value=array(
                          'delivery_boy_name'=>$delivery_boy_name,'delivery_boy_image'=>$delivery_boy_image, 'delivery_boy_pass'=>$new_pass,'delivery_boy_phone'=>$delivery_boy_phone, 'updated_at'=>$updated_at);
                    }
                } else {
                    $value=array(
                      'delivery_boy_name'=>$delivery_boy_name,'delivery_boy_image'=>$delivery_boy_image, 'delivery_boy_phone'=>$delivery_boy_phone,'updated_at'=>$updated_at);
                }
              
                $update = DB::table('delivery_boy')
                 ->where('delivery_boy_id', $delivery_boy_id)
                 ->update($value);

                if ($update) {
                    return redirect()->route('resturantdelivery_boy')->withErrors(' updated successfully');
                } else {
                    return redirect()->back()->withErrors("something wents wrong.");
                }
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }

    public function resturantdeletedelivery_boy(Request $request)
    {
        if (Session::has('vendor')) {
            $delivery_boy_id=$request->id;

            $getfile=DB::table('delivery_boy')
                ->where('delivery_boy_id', $delivery_boy_id)
                ->first();

            $delivery_boy_image=$getfile->delivery_boy_image;

            $delete=DB::table('delivery_boy')->where('delivery_boy_id', $request->id)->delete();
            if ($delete) {
                if (file_exists($delivery_boy_image)) {
                    unlink($delivery_boy_image);
                }
         
                return redirect()->back()->withErrors('delete successfully');
            } else {
                return redirect()->back()->withErrors('unsuccessfull delete');
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('Please Login First');
        }
    }
    
    public function resturantconfirmdeliverystatus(Request $request)
    {
        $status = $request->status;
        $id = $request->id;
        
        $confirmdeliverystatus = DB::table('delivery_boy')->where('delivery_boy_id', $id)->update(['is_confirmed'=>$status]);
        
        if ($confirmdeliverystatus) {
            return redirect()->back()->withErrors('Success');
        } else {
            return redirect()->back()->withErrors('Something wrong');
        }
    }
    public function resturantcityadmindelivery_boy(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            $delivery_boy= DB::table('delivery_boy_vendor')
        ->join('delivery_boy', 'delivery_boy_vendor.delivery_boy_id', '=', 'delivery_boy.delivery_boy_id')
        ->where('delivery_boy_vendor.vendor_id', $vendor->vendor_id)
         ->where('delivery_boy.is_confirmed', 1)
        ->get();
            return view('resturant.delivery_boy.cityadmindelivery_boy', compact("vendor_email", "delivery_boy", "vendor"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
}
