<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;
use Excel;
use Illuminate\Support\Facades\View;

class cityadminController extends Controller
{
    public function cityadmin(Request $request)
    {
        
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        $cityadmin= DB::table('cityadmin')
        ->select('cityadmin.*','roles.name AS role_name')
        ->leftJoin('roles','cityadmin.role_id','=','roles.id')
        ->orderBy('cityadmin_id','desc')
        ->paginate(10);
       
        return view('admin.cityadmin.cityadmin',compact("admin_email","cityadmin","admin"));
    }
    
     public function Addcityadmin(Request $request)
    {
  
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();
                
        $getCityAdmin = DB::table('cityadmin')->pluck('city_id')->toArray();
        
        $city= DB::table('city')
                ->whereNotIn('city_id', $getCityAdmin)
                ->get();
        $map1 = DB::table('map_API')
             ->first();
         $map = $map1->map_api_key;     
         $mapset = DB::table('map_settings')
                ->first();
        $mapbox = DB::table('mapbox')
                ->first();
                $countries = new Countries();
                $countries =  $countries->all();
                //dd($countries->where('cca2','US'));
             $roles=   DB::table('roles')->where('name','like','%countryfranchise%')->orWhere('name','like','%cityfranchise%')->get();
         return view('admin.cityadmin.addcityadmin',compact("admin_email","city","admin","map1","mapset","mapbox","map","countries",'roles'));
    }
    
    
    public function AddNewcityadmin(Request $request)
    {
        $this->validate($request,[
               'role_id' => 'required',
               'cityadmin_name' => 'required',
               'cityadmin_email' => 'required',
                'cityadmin_phone' => 'required',
                'cityadmin_address' => 'required',
                'country' => 'required',
                'currency' => 'required',
                'password1' => 'required',
                'password2' => 'required',
               'cityadmin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

           ]);
        
       
        $cityadmin_id=$request->id;
        $city_name=$request->city_name;
        $cityadmin_name=$request->cityadmin_name;
        $cityadmin_email=$request->cityadmin_email;
        $cityadmin_phone=$request->cityadmin_phone;
        $password=$request->password1;
        $password2=$request->password2;
        $address = $request->cityadmin_address; 
        $addres = str_replace(" ", "+", $address);
        $address1 = str_replace("-", "+", $addres);
        $lat = $request->lat;
        $lng = $request->lng; 
        
      
                    
        
        $old_cityadmin_image=$request->old_cityadmin_image;
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
        $cityadmin_image = $request->cityadmin_image;
        if (!empty($cityadmin_image)) {
            $fileName = date('dmyhisa').'-'.$cityadmin_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $cityadmin_image->move('cityadmin_img/images/'.$date.'/', $fileName);
            $cityadmin_image = 'cityadmin_img/images/'.$date.'/'.$fileName;
        }
        if($request->city_name==''){
            $checkcountryadmin= DB::table('cityadmin')
            ->where('country', $request->country)
            ->get();
            if(count($checkcountryadmin)>0){
              return redirect()->back()->withErrors('Country Franchise already Created');
          }
        }
        
        $checkcityadmin= DB::table('cityadmin')
                      ->where('cityadmin_email', $cityadmin_email)
                      ->get();
        if(count($checkcityadmin)>0){
            return redirect()->back()->withErrors('Franchise already Created');
        }
       else{
        if($password!=$password2){
             return redirect()->back()->withErrors('password are not same');
        }

       else{
        $new_pass=Hash::make($password);
        $insert = DB::table('cityadmin')
                  ->insertGetId(['role_id'=>$request->role_id,'cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email,'cityadmin_phone'=> $cityadmin_phone, 'cityadmin_pass'=>$new_pass,'cityadmin_address'=>$address,
                  'lat'=>$lat,
                  'lng'=>$lng, 
                  'country'=>$request->country,
                  'cca3'=>$request->cca3,
                  'cca2'=>$request->cca2,
                  'city'=>$request->city_name,
                  'currency'=>$request->currency,
                  'dialling_code'=>$request->dialling_code,
                  'created_at'=>$created_at,
                  'timezone'=>$request->timezone,
                  ]);
                  if($insert){
                    DB::table('incentive_amount')
                    ->insert(['cityadmin_id'=>$insert]);  
                  }else{
                    return redirect()->back()->withErrors($insert);
                  }
                    
     
     return redirect()->route('cityadmin')->withErrors('successfully Created');

    }
    }
   } 
    public function Editcityadmin(Request $request)
    {
    
       $cityadmin_id=$request->id;
    	 $admin_email=Session::get('admin');
    	 
    	 $getCityAdmin = DB::table('cityadmin')->where('cityadmin_id', '!=', $cityadmin_id)->pluck('city_id')->toArray();
    	 
    	 $city=DB::table('city')
    	        ->whereNotIn('city_id', $getCityAdmin)
                ->get();
                
         $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();       
    	 $cityadmin= DB::table('cityadmin')
    	 		  ->where('cityadmin_id',$cityadmin_id)
    	 		  ->first();
    	 $map1 = DB::table('map_API')
             ->first();
         $map = $map1->map_api_key;     
         $mapset = DB::table('map_settings')
                ->first();
        $mapbox = DB::table('mapbox')
                ->first();
        $countries = new Countries();
        $countries =  $countries->all();
       
       
        $cities= $countries->where('cca3',$cityadmin->cca3)
        ->first()
        ->hydrate('cities')
        ->cities;
        $currencies= $countries->where('cca3',$cityadmin->cca3)
        ->first()
        ->hydrate('currencies')
        ->currencies;
        $roles=   DB::table('roles')->where('name','like','%countryfranchise%')->orWhere('name','like','%cityfranchise%')->get();
    	 return view('admin.cityadmin.Editcityadmin',compact("admin_email","admin","city","cityadmin_id","cityadmin","map1","mapset","mapbox","map","countries","cities","currencies","roles"));


    }
    public function Updatecityadmin(Request $request)
    {
    
        $cityadmin_id=$request->id;
        $cityadmin_name=$request->cityadmin_name;
        $cityadmin_email=$request->cityadmin_email;
        $cityadmin_phone=$request->cityadmin_phone;
        $password=$request->password1;
        $password2=$request->password2;
        $old_cityadmin_image=$request->old_cityadmin_image;

       
        $city_name=$request->city_name;
      

        $address = $request->cityadmin_address; 
        $addres = str_replace(" ", "+", $address);
        $address1 = str_replace("-", "+", $addres);
        $checkmap = DB::table('map_API')
                  ->first();
         $mapset= DB::table('map_settings')
                ->first();
                
        $date = date('d-m-Y');
        $updated_at = date("d-m-y h:i a");
        $date=date('d-m-y');
        

        $getImage = DB::table('cityadmin')
                     ->where('cityadmin_id',$cityadmin_id)
                    ->first();

        $image = $getImage->cityadmin_image;  
      
       if($password!=$password2){
             return redirect()->back()->withErrors('password are not same');
        }

       else{
        if($request->hasFile('cityadmin_image')){
             if(file_exists($image)){
                unlink($image);
            }
            $cityadmin_image = $request->cityadmin_image;
            $fileName = date('dmyhisa').'-'.$cityadmin_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $cityadmin_image->move('cityadmin_img/images/'.$date.'/', $fileName);
            $cityadmin_image = 'cityadmin_img/images/'.$date.'/'.$fileName;
        }
        else{
            $cityadmin_image = $old_cityadmin_image;
        }
        
         if($password!="" && $password2!="")
        {
            if($password!=$password2){
                return redirect()->back()->withErrors('password are not same');
            }
            else
            {
                $new_pass=Hash::make($password);
                $value=array('role_id'=>$request->role_id,'cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email,'cityadmin_phone'=> $cityadmin_phone, 'cityadmin_pass'=>$new_pass,'cityadmin_address'=>$address,
                'country'=>$request->country,
                'cca3'=>$request->cca3,
                'cca2'=>$request->cca2,
                'lat'=>$request->lat,
                'lng'=>$request->lng,
                'city'=>$request->city_name,'currency'=>$request->currency,'dialling_code'=>$request->dialling_code, 'updated_at'=>$updated_at,
                'timezone'=>$request->timezone);
            }
            
        }
        else
        {
            $value=array('role_id'=>$request->role_id,'cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email, 'cityadmin_phone'=> $cityadmin_phone,'cityadmin_address'=>$address,'country'=>$request->country,
            'cca3'=>$request->cca3,
            'cca2'=>$request->cca2,
            'lat'=>$request->lat,
            'lng'=>$request->lng,
            'city'=>$request->city_name,'currency'=>$request->currency,'dialling_code'=>$request->dialling_code,'updated_at'=>$updated_at,'timezone'=>$request->timezone);
        }

        $update = DB::table('cityadmin')
                 ->where('cityadmin_id', $cityadmin_id)
                 ->update($value);

        if($update){

             

            return redirect()->route('cityadmin')->withErrors(' updated successfully');
        }
        else{
            return redirect()->route('cityadmin')->withErrors("something wents wrong.");
        }
    }
}    

    public function deletecityadmin(Request $request)
    {
   
        $cityadmin_id=$request->id;

        $getfile=DB::table('cityadmin')
                ->where('cityadmin_id',$cityadmin_id)
                ->first();

        $cityadmin_image=isset($getfile->cityadmin_image) && !empty($getfile->cityadmin_image)? $getfile->cityadmin_image : '';
        $cityadmin_id=$getfile->cityadmin_id;

        DB::table('vendor')->where('cityadmin_id',$cityadmin_id)->delete();
        
    	$delete=DB::table('cityadmin')->where('cityadmin_id',$request->id)->delete();
        if($delete)
        {
        
            if(file_exists($cityadmin_image) && !empty($cityadmin_image)){
                unlink($cityadmin_image);
            }
         
        return redirect()->back()->withErrors('delete successfully');

        }
        else
        {
           return redirect()->back()->withErrors('unsuccessfull delete'); 
        }

    }
    
    public function secretlogin(Request $request)
    {
        $id=$request->id;
        $checkcityadminLogin = DB::table('cityadmin')
    	                   ->where('cityadmin_id',$id)
    	                   ->first();

    	if($checkcityadminLogin){

           session::put('cityadmin',$checkcityadminLogin->cityadmin_email);
           return redirect()->route('cityadmin-index');
         
    	}else
         {
         	return redirect()->route('cityadmin')->withErrors('Something Wents Wrong');
         }
    }
    
    public function vendorlist(Request $request)
    {
        $id=$request->id;
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        $cityadmin= DB::table('vendor')
       
        ->where('cityadmin_id',$id)
        ->get();
        return view('admin.cityadmin.vendorlist',compact("admin_email","cityadmin","admin"));
    }
    
    public function secretloginvendor(Request $request)
    {
        $id=$request->id;
        $checkcityadminLogin = DB::table('vendor')
    	                   ->where('cityadmin_id',$id)
    	                   ->first();

    	if($checkcityadminLogin){

           session::put('vendor',$checkcityadminLogin->vendor_email);
           return redirect()->route('vendor-index');
         
    	}else
         {
         	return redirect()->route('vendor')->withErrors('Something Wents Wrong');
         }
    }
    public function admincommission(Request $request)
    {
       
         $id=$request->id;
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        $orders = DB::table('cityadmin')
                            ->join('vendor','cityadmin.cityadmin_id','=','vendor.cityadmin_id')
                            ->join('comission','vendor.vendor_id','comission.vendor_id')
    	                   ->where('vendor.vendor_id',$id)
    	                   ->get();
                         
         	return view('admin.cityadmin.commission',compact("admin_email","admin","orders","id"));
         }

         public function vendorallexcelgenerator(Request $request)
         {
     
            $id=$request->id;
           if(Session::has('admin'))
           {
               
            $admin_email=Session::get('admin');
            $admin=DB::table('admin')
            ->where('admin_email',$admin_email)
            ->first();
            $orders= DB::table('comission')
            ->where('vendor_id',$id)
            ->get();
     
               $orders_array[] = array('ComissionID', 'Vendor Name', 'Order Date', 'Total Product Price','Comission Price','Status','CartID','User Name','Payment Method');
               foreach($orders as $data)
               {
                $orders_array[] = array(
                 'ComissionID'  => $data->com_id,
                 'Vendor Name'    => $data->vendor_name,
                 'Order Date'  => $data->order_date,
                 'Total Product Price'   => $data->total_price,
                 'Comission Price'   => $data->comission_price,
                 'Status'   => $data->status,
                 'Cart ID'   => $data->cart_id,
                 'User Name'   => $data->user_name,
                 'Payment Method' => $data->payment_method
     
      
                );
               }
               Excel::create('commission', function($excel) use ($orders_array){
                 $excel->setTitle('commission');
                 $excel->sheet('commission', function($sheet) use ($orders_array){
                  $sheet->fromArray($orders_array, null, 'A1', false, false);
                 });
              })->download('xlsx');
     
                    }
         else
              {
                 return redirect()->route('adminlogin')->withErrors('please login first');
              }
     
         }
         public function vendorsearchcomission(Request $request)
         {
     
           $this->validate($request,[
              'startdate' => 'required',
              'enddate' => 'required',
          ]);
           $sdate=$request->startdate;
           $edate=$request->enddate;
           $id=$request->id;

             if(Session::has('admin'))
               {
                      $admin_email=Session::get('admin');
             
                         $admin=DB::table('admin')
                         ->where('admin_email',$admin_email)
                         ->first();
                    If($sdate!=null && $edate!=null && $id!=null){
                       $orders = $this->getSearch($sdate,$edate,$id);
     
     
                        return view('admin.cityadmin.commission',compact("admin_email","admin","orders","id"));
     
                    }else{
     
                        $orders= DB::table('comission')
                        ->where('vendor_id',$id)
                        ->get();
     
                      return view('admin.cityadmin.commission',compact("admin_email","admin","orders","id"));
                    }
                 
               }
             else
                  {
                     return redirect()->route('vendorlogin')->withErrors('please login first');
                  }
     
     
         }
         public function getSearch($sdate,$edate,$id)
     {
         if($sdate!=null && $edate!=null && $id!=null ){
             
          $od = DB::table('comission')->where([['order_date','>=',$sdate],['order_date','<=',$edate],['vendor_id',$id]])->get();
            return $od;
         }
          
          
     }

     public function vendorexcelgenerator($startdate,$enddate,$vendor_id)
     {
       $admin_email=Session::get('admin');
     $admin=DB::table('admin')
     ->where('admin_email',$admin_email)
     ->first();
    
     $ordersdata= DB::table('comission')
     ->where([['order_date','>=',$startdate],['order_date','<=',$enddate]])
     ->where('vendor_id',$vendor_id)->orderBy('order_date', 'desc')
    ->get();
    
    $orders_array[] = array('ComissionID', 'Vendor Name', 'Order Date', 'Total Product Price','Comission Price','Status','CartID','User Name','Payment Method');
    foreach($ordersdata as $data)
    {
    $orders_array[] = array(
    'ComissionID'  => $data->com_id,
    'Vendor Name'    => $data->vendor_name,
    'Order Date'  => $data->order_date,
    'Total Product Price'   => $data->total_price,
    'Comission Price'   => $data->comission_price,
    'Status'   => $data->status,
    'Cart ID'   => $data->cart_id,
    'User Name'   => $data->user_name,
    'Payment Method' => $data->payment_method
    
    
    );
    }
    Excel::create('commission', function($excel) use ($orders_array){
    $excel->setTitle('commission');
    $excel->sheet('commission', function($sheet) use ($orders_array){
    $sheet->fromArray($orders_array, null, 'A1', false, false);
    });
    })->download('xlsx');
     }

     public function cities(Request $request)
     {
       $cca3= $request->cca3;
       $cca2= $request->cca2;
        $countries = new Countries();
        /* $countries->where('cca3', $cca3)
        ->first()->dialling->international_prefix. */
        $dialling_code = '+'.$countries->where('cca2', $cca2)
        ->first()->dialling->calling_code[0];
      $cities= $countries->where('cca2', $cca2)
    ->first()
    ->hydrate('cities')
    ->cities;
    return ['cities'=>$cities,'dialling_code'=>$dialling_code];
     }
     public function currency(Request $request)
     {
       $cca3= $request->cca3;
       $cca2= $request->cca2;
       
        $countries = new Countries();
      $currencies= $countries->where('cca2', $cca2)
    ->first()
    ->hydrate('currencies')
    ->currencies;
    return $currencies;
     }
}
