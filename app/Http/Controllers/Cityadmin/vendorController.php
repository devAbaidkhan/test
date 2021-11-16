<?php

namespace App\Http\Controllers\Cityadmin;

use App\VendorPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;
use App\Traits\SendMail;
use App\Traits\SendSms;

class vendorController extends Controller
{
    use SendMail;
    use SendSms;
    public function vendor(Request $request)
    {

        if (Session::has('cityadmin')) {
            $cityadmin_email=Session::get('cityadmin');
            $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
            $vendor= DB::table('vendor')
                ->leftjoin('vendor_packages', function($q) {
                    $q->on('vendor.vendor_id', '=', 'vendor_packages.vend_id')
                        ->where('vendor_packages.status', '=', 'active');
                })
        ->where('cityadmin_id', $cityadmin->cityadmin_id)
        ->get()->groupBy('vendor_id');

            return view('cityadmin.vendor.vendor', compact("cityadmin_email", "vendor", "cityadmin"));
        } else {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
        }
    }
    
    public function Addvendor(Request $request)
    {

        if (Session::has('cityadmin')) {
            $cityadmin_email=Session::get('cityadmin');
            $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
            $packages= DB::table('packages')->where('country',$cityadmin->country)->orderBy('id','desc')->paginate(10);

            $vendor_category = DB::table('vendor_category')
                            ->get();
            $map1 = DB::table('map_API')
                         ->first();
            $map = $map1->map_api_key;
            $mapset = DB::table('map_settings')
                            ->first();
            $mapbox = DB::table('mapbox')
                            ->first();
            $ui = DB::table('UI_Vendor')
                        ->get();


        
            return view('cityadmin.vendor.addvendor', compact("cityadmin_email", "cityadmin", "vendor_category", "map1", "mapset", "mapbox", "ui", "map",'packages'));
        } else {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
        }
    }
    
    
    public function AddNewvendor(Request $request)
    {
        $this->validate($request, [
               'vendor_name' => 'required',
               'owner_name' => 'required',
               'vendor_email' => 'required',
               'vendor_phone' => 'required',
               'opening_time' => 'required',
               'closing_time' => 'required',
               /* 'comission' => 'required', */
               'range' => 'required',
               'password1' => 'required',
               'password2' => 'required',
               'vendor_address' => 'required',
               'avg_cost_meal' => 'required',
               

           ]);



        if (Session::has('cityadmin')) {
            $logo = DB::table('logo')
                ->where('logo_id', '1')
                ->first();
            $app_name =  $logo->logo_name;
         
            $cityadmin_email=Session::get('cityadmin');
            $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
            $cityadmin_id = $cityadmin->cityadmin_id;
        
            $vendor_category_id=$request->vendor_category_id;
            $vendor_id=$request->id;
            $vendor_name=$request->vendor_name;
            $owner = $request->owner_name;
            $vendor_email=$request->vendor_email;
            $vendor_phone=$request->vendor_phone;
            $opening_time=$request->opening_time;
            $closing_time=$request->closing_time;
            /*   $comission =$request->comission; */
            /*   $discount = str_replace("%",'', $comission); */
            $discount =null;
            $range =$request->range;
            $password=$request->password1;
            $password2=$request->password2;
            $address = $request->vendor_address;
            $slug=$this->slugify($vendor_name);
            $lat = $request->lat;
            $lng = $request->lng;
            $vendor_category = DB::table('vendor_category')
                            ->where('vendor_category_id', $vendor_category_id)
                            ->first();
            $ui_type =    $vendor_category->ui_type;
        
                
            $chkstorphon = DB::table('vendor')
                      ->where('vendor_phone', $vendor_phone)
                      ->first();
            $chkstoremail = DB::table('vendor')
                      ->where('vendor_email', $vendor_email)
                      ->first();
                
            if ($chkstorphon && $chkstoremail) {
                return redirect()->back()->withErrors('This Phone Number and Email Are Already Registered With Another Vendor');
            }

            if ($chkstorphon) {
                return redirect()->back()->withErrors('This Phone Number is Already Registered With Another Vendor');
            }
            if ($chkstoremail) {
                return redirect()->back()->withErrors('This Email is Already Registered With Another Vendor');
            }
      
            $old_vendor_image=$request->old_vendor_image;
            $date = date('d-m-Y');
            $created_at=date('d-m-Y h:i a');
            if (!empty($request->vendor_image)) {
                $vendor_image = $request->vendor_image;
                $fileName = date('dmyhisa').'-'.$request->vendor_img->getClientOriginalName();
                $fileName = str_replace(" ", "-", $fileName);
               // $vendor_image->move('partners/images/'.$date.'/', $fileName);
               // decode the base64 file
               $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->vendor_image));
               //todo :  remove this comment in live
//               file_put_contents('partners/images/'. $fileName, $file);
              
                $vendor_image = 'partners/images/'.$fileName;
            } else {
                $vendor_image=null;
            }
            if (!empty(($request->main_image))) {
                $main_image = $request->main_image;
                $fileName = date('dmyhisa').'-'.$request->main_img->getClientOriginalName();
                $fileName = str_replace(" ", "-", $fileName);
               // $main_image->move('partners/images/'.$date.'/', $fileName);
               
               $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->main_image));
//               file_put_contents('partners/images/'. $fileName, $file);
                $main_image = 'partners/images/'.$fileName;
            } else {
                $main_image=null;
            }
            
            if ($password!=$password2) {
                return redirect()->back()->withErrors('password are not same');
            } else {
                $new_pass=Hash::make($password);
                $insert = DB::table('vendor')
                  ->insertGetId(['cityadmin_id'=>$cityadmin_id,
                      'vendor_name'=>$vendor_name,
                      'vendor_logo'=>$vendor_image,
                      'main_image'=>$main_image,
                      'vendor_email'=> $vendor_email,
                      'vendor_phone'=> $vendor_phone,
                      'vendor_pass'=>$new_pass,
                      'vendor_loc'=>$address,
                      'physical_address'=>$request->physical_address,
                      'lat'=>$lat,'lng'=>$lng,
                      'opening_time'=>$opening_time,
                      'closing_time'=>$closing_time,
                      'owner'=>$owner,
                      'created_at'=>$created_at,
                      'comission'=>$discount,
                      'vendor_category_id'=>$vendor_category_id,
                      'delivery_range'=>$range,
                      'ui_type'=>$ui_type,
                      'online_status'=>'ON',
                      'slug'=>$slug,
                      'avg_cost_meal'=>$request->avg_cost_meal
                  ]);

                if (isset($request->package)){
                    $pkg = new VendorPackage();
                    $pkg->vendor_id = $insert;
                    $pkg->package_id = $request->package;
                    $pkg->status  = 'active';
                    $pkg->activation_date  = Carbon::now();
                    $pkg->save();
                }
    
                $time = DB::table('time_slot')->insert(['vendor_id'=>$insert,'open_hour'=>$opening_time,'close_hour'=>$closing_time,'time_slot'=>60]);
                //  $welcomeMail = $this->payoutMail($vendor_name,$vendor_email,$app_name,$password);
     
                return redirect()->route('vendor')->withErrors('successfully Created');
            }
        } else {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
        }
    }
  
  
  
    public function Editvendor(Request $request)
    {
        if (Session::has('cityadmin')) {
            $vendor_id=$request->id;
            $cityadmin_email=Session::get('cityadmin');
    
            $cityadmin=DB::table('cityadmin')
                ->where('cityadmin_email', $cityadmin_email)
                ->first();
            $vendor= DB::table('vendor')
                  ->where('vendor_id', $vendor_id)
                  ->first();
            $map1 = DB::table('map_API')
             ->first();
            $map = $map1->map_api_key;
            $mapset = DB::table('map_settings')
                ->first();
            $mapbox = DB::table('mapbox')
                ->first();
            $vendor_category = DB::table('vendor_category')
                            ->get();
            $ui = DB::table('UI_Vendor')
                        ->get();
        
            return view('cityadmin.vendor.Editvendor', compact("cityadmin_email", "cityadmin", "vendor_id", "vendor", "map1", "mapset", "mapbox", "vendor_category", "ui", "map"));
        } else {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
        }
    }
    public function Updatevendor(Request $request)
    {
        if (Session::has('cityadmin')) {
            $cityadmin_email=Session::get('cityadmin');
            $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
            $cityadmin_id = $cityadmin->cityadmin_id;
            $ui=$request->ui;
            $vendor_category_id=$request->vendor_category_id;
            $vendor_id=$request->id;
            $vendor_name=$request->vendor_name;
            $owner = $request->owner_name;
            $vendor_email=$request->vendor_email;
            $vendor_phone=$request->vendor_phone;
            $opening_time=$request->opening_time;
            $closing_time=$request->closing_time;
            /*  $comission =$request->comission;
             $discount = str_replace("%",'', $comission); */
            $discount=null;
            $range =$request->range;
            $password=$request->password1;
            $password2=$request->password2;
            $address = $request->vendor_address;
            $old_vendor_image= $request->old_vendor_image;
            $lat = $request->lat;
            $lng = $request->lng;
            /* $addres = str_replace(" ", "+", $address);
            $address1 = str_replace("-", "+", $addres); */
            $new_pass=Hash::make($password);
        
            $vendor_category = DB::table('vendor_category')
                            ->where('vendor_category_id', $vendor_category_id)
                            ->first();
            $ui_type =    $vendor_category->ui_type;

                    
            $date = date('d-m-Y');
            $updated_at = date("d-m-y h:i a");
            $date=date('d-m-y');
        

            $getImage = DB::table('vendor')
                     ->where('vendor_id', $vendor_id)
                    ->first();

            $image = $getImage->vendor_logo;
      
            if ($password!=$password2) {
                return redirect()->back()->withErrors('password are not same');
            } else {

                if (!empty($request->vendor_image)) {
                    if (file_exists($image)) {
                        unlink($image);
                    }
                    $vendor_image = $request->vendor_image;
                    $fileName = date('dmyhisa').'-'.$request->vendor_img->getClientOriginalName();
                    $fileName = str_replace(" ", "-", $fileName);
                   // $vendor_image->move('partners/images/'.$date.'/', $fileName);
                   $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->vendor_image));
                   file_put_contents('partners/images/'. $fileName, $file);
                    $vendor_image = 'partners/images/'.$fileName;
                } else {
                    $vendor_image = $old_vendor_image;
                }
                if (!empty($request->main_image)) {
                    $main_image = $request->main_image;
                    $fileName = date('dmyhisa').'-'.$request->main_img->getClientOriginalName();
                    $fileName = str_replace(" ", "-", $fileName);
                  //  $main_image->move('partners/images/'.$date.'/', $fileName);
                  $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->main_image));
                  file_put_contents('partners/images/'. $fileName, $file);
                    $main_image = 'partners/images/'.$fileName;
                } else {
                    $main_image=$request->old_main_image;
                }
                
        
                if ($password!="" && $password2!="") {
                    if ($password!=$password2) {
                        return redirect()->back()->withErrors('password are not same');
                    } else {
                        $new_pass=Hash::make($password);
                        $value=array('cityadmin_id'=>$cityadmin_id,'vendor_name'=>$vendor_name,
                'vendor_logo'=>$vendor_image,
                'main_image'=>$main_image,
                'vendor_email'=> $vendor_email,'vendor_phone'=> $vendor_phone, 'vendor_loc'=>$address,'physical_address'=>$request->physical_address,'lat'=>$lat,'lng'=>$lng,'opening_time'=>$opening_time, 'closing_time'=>$closing_time,'owner'=>$owner,'updated_at'=>$updated_at,'ui_type'=>$ui_type,'vendor_category_id'=>$vendor_category_id,'vendor_pass'=>$new_pass,
                'avg_cost_meal'=>$request->avg_cost_meal
              );
                    }
                } else {
                    $value=array('cityadmin_id'=>$cityadmin_id,'vendor_name'=>$vendor_name,'vendor_logo'=>$vendor_image,
            'main_image'=>$main_image,
            'vendor_email'=> $vendor_email,'vendor_phone'=> $vendor_phone, 'vendor_pass'=>$new_pass,'vendor_loc'=>$address,'physical_address'=>$request->physical_address,'lat'=>$lat,'lng'=>$lng,'opening_time'=>$opening_time, 'closing_time'=>$closing_time,'owner'=>$owner,'updated_at'=>$updated_at,'ui_type'=>$ui_type,'vendor_category_id'=>$vendor_category_id,'avg_cost_meal'=>$request->avg_cost_meal);
                }

                $update = DB::table('vendor')
                 ->where('vendor_id', $vendor_id)
                 ->update($value);
          

                if ($update) {
                    return redirect()->route('vendor')->withErrors('Updated successfully');
                } else {
                    return redirect()->back()->withErrors("something wents wrong.");
                }
            }
        } else {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
        }
    }

    public function deletevendor(Request $request)
    {
        if (Session::has('cityadmin')) {
            $vendor_id=$request->id;

            $getfile=DB::table('vendor')
                ->where('vendor_id', $vendor_id)
                ->first();

            $vendor_image=$getfile->vendor_logo;

            $delete=DB::table('vendor')->where('vendor_id', $request->id)->delete();
            if ($delete) {
                if (file_exists($vendor_image)) {
                    unlink($vendor_image);
                }
         
                return redirect()->back()->withErrors('Delete successfully');
            } else {
                return redirect()->back()->withErrors('Unsuccessfull delete');
            }
        } else {
            return redirect()->route('cityadminlogin')->withErrors('Please Login First');
        }
    }

    public function searchvendor(Request $request)
    {
        $this->validate($request, [
         'vendorname' => 'required',
     ]);
        $vendorname=$request->vendorname;

        if (Session::has('cityadmin')) {
            $cityadmin_email=Session::get('cityadmin');
            $cityadmin=DB::table('cityadmin')
            ->where('cityadmin_email', $cityadmin_email)
            ->first();
            $id=$cityadmin->cityadmin_id;
            if ($vendorname!=null && $id!=null) {
                $vendor = $this->getSearch($vendorname, $id);


                return view('cityadmin.vendor.vendor', compact("cityadmin_email", "vendor", "cityadmin"));
            } else {
                $vendor= DB::table('vendor')
                ->where('cityadmin_id', $cityadmin->cityadmin_id)
                ->get();
                return view('cityadmin.vendor.vendor', compact("cityadmin_email", "vendor", "cityadmin"));
            }
        } else {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
        }
    }
    public function getSearch($vendorname, $id)
    {
        if ($vendorname!=null && $id!=null) {
            $od = DB::table('vendor')
     ->where('cityadmin_id', $id)
     ->where([['vendor_name','=',$vendorname]])->get();
            return $od;
        }
    }

    public function vendorsecretlogin(Request $request)
    {
        $id=$request->id;
        $checkcityadminLogin = DB::table('vendor')
                           ->where('vendor_id', $id)
                           ->first();

        if ($checkcityadminLogin) {
            session::put('vendor', $checkcityadminLogin->vendor_email);
            if ($checkcityadminLogin->ui_type==1) {
                return redirect()->route('vendor-index');
            } elseif ($checkcityadminLogin->ui_type==2) {
                return redirect()->route('resturant-index');
            } elseif ($checkcityadminLogin->ui_type==3) {
                return redirect()->route('pharmacy-index');
            }
        } else {
            return redirect()->route('cityadmin')->withErrors('Something Wents Wrong');
        }
    }
    public function slugify($slug)
    {
        $slug= str_slug($slug);
        $res= DB::table('vendor')->where('slug', $slug)->count();
        if ($res) {
            $slug=$slug.'-'.$res;
            str_slug($slug);
            $this->slugify($slug);
        }
        return  $slug;
    }
}
