<?php

namespace App\Http\Controllers\Cityadmin;

use App\CityFranchise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use PragmaRX\Countries\Package\Countries;

class CityFranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Session::get('role');
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
        if ($role=='CountryFranchise') {
            $country=   Session::get('franchise_admin')->country;
            $cityfranchises= DB::table('cityadmin')
            ->select('cityadmin.*', 'roles.name AS role_name')
            ->leftJoin('roles', 'cityadmin.role_id', '=', 'roles.id')
            ->where('cityadmin.country', $country)
            ->whereNotNull('city')
            ->orderBy('cityadmin_id', 'desc')
            ->paginate(10);
            return view('cityadmin.city-franchise.city-franchise', get_defined_vars());
        }
        
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
        $countries = new Countries();
        $cities= $countries->where('cca3', Session::get('franchise_admin')->cca3)
        ->first()
        ->hydrate('cities')
        ->cities;
        $currencies= $countries->where('cca3', Session::get('franchise_admin')->cca3)
        ->first()
        ->hydrate('currencies')
        ->currencies;
        return view('cityadmin.city-franchise.add-city-franchise', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cityadmin_name' => 'required',
            'cityadmin_email' => 'required',
             'cityadmin_phone' => 'required',
             'cityadmin_address' => 'required',
             'city_name' => 'required',
             'currency' => 'required',
             'password1' => 'required',
             'password2' => 'required',
            'cityadmin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

     ]);
     
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
        $roles= DB::table('roles')->where('name', 'CityFranchise')->first();
       $country= session::get('franchise_admin')->country;
                 
     
        $old_cityadmin_image=$request->old_cityadmin_image;
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
        $cityadmin_image = $request->cityadmin_image;
        if (!empty($cityadmin_image)) {
            
            $fileName = date('dmyhisa').'-'.$cityadmin_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $cityadmin_image->move('CityFranchise/images/'.$date.'/', $fileName);
            $cityadmin_image = 'CityFranchise/images/'.$date.'/'.$fileName;
        }
        $checkcityadmin= DB::table('cityadmin')
                   ->where('cityadmin_email', $cityadmin_email)
                   ->get();
        if (count($checkcityadmin)>0) {
            return redirect()->back()->withErrors('Franchise already Created');
        } else {
            if ($password!=$password2) {
                return redirect()->back()->withErrors('password are not same');
            } else {
                $new_pass=Hash::make($password);
                $insert = DB::table('cityadmin')
               ->insertGetId(['role_id'=>$roles->id,'cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email,'cityadmin_phone'=> $cityadmin_phone, 'cityadmin_pass'=>$new_pass,'cityadmin_address'=>$address,
               'lat'=>$lat,
               'lng'=>$lng,
               'cca3'=>$request->cca3,
               'cca2'=>session::get('franchise_admin')->cca2,
               'country'=>$country,
               'city'=>$request->city_name,
               'currency'=>$request->currency,
               'timezone'=>$request->timezone,
               'dialling_code'=>$request->dialling_code,
               'created_at'=>$created_at,
               ]);
                if ($insert) {
                    DB::table('incentive_amount')
                 ->insert(['cityadmin_id'=>$insert]);
                } else {
                    return redirect()->back()->withErrors($insert);
                }
                 
  
                return redirect()->route('city-franchise.index')->withErrors('successfully Created');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CityFranchise  $cityFranchise
     * @return \Illuminate\Http\Response
     */
    public function show(CityFranchise $cityFranchise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CityFranchise  $cityFranchise
     * @return \Illuminate\Http\Response
     */
    public function edit(CityFranchise $cityFranchise)
    {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
        $countries = new Countries();
        $cities= $countries->where('cca3', Session::get('franchise_admin')->cca3)
        ->first()
        ->hydrate('cities')
        ->cities;
        $currencies= $countries->where('cca3', Session::get('franchise_admin')->cca3)
        ->first()
        ->hydrate('currencies')
        ->currencies;
        return view('cityadmin.city-franchise.edit-city-franchise', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CityFranchise  $cityFranchise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityFranchise $cityFranchise)
    {
        $cityadmin_id=$cityFranchise->cityadmin_id;
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
        
                
        $date = date('d-m-Y');
        $updated_at = date("d-m-y h:i a");
        $date=date('d-m-y');
        

        $getImage = DB::table('cityadmin')
                     ->where('cityadmin_id', $cityadmin_id)
                    ->first();

        $image = $getImage->cityadmin_image;
      
        if ($password!=$password2) {
            return redirect()->back()->withErrors('password are not same');
        } else {
            if ($request->hasFile('cityadmin_image')) {
                if (file_exists($image)) {
                    unlink($image);
                }
                $cityadmin_image = $request->cityadmin_image;
                $fileName = date('dmyhisa').'-'.$cityadmin_image->getClientOriginalName();
                $fileName = str_replace(" ", "-", $fileName);
                $cityadmin_image->move('CityFranchise/images/'.$date.'/', $fileName);
                $cityadmin_image = 'CityFranchise/images/'.$date.'/'.$fileName;
            } else {
                $cityadmin_image = $old_cityadmin_image;
            }
        
            if ($password!="" && $password2!="") {
                if ($password!=$password2) {
                    return redirect()->back()->withErrors('password are not same');
                } else {
                    $new_pass=Hash::make($password);
                    $value=array('cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email,'cityadmin_phone'=> $cityadmin_phone, 'cityadmin_pass'=>$new_pass,'cityadmin_address'=>$address,
                'city'=>$request->city_name,
                'currency'=>$request->currency,
                'lat'=>$request->lat,
                'lng'=>$request->lng,
                'cca2'=>$request->cca2,
                'cca3'=>$request->cca3,
                'updated_at'=>$updated_at,'timezone'=>$request->timezone);
                }
            } else {
                $value=array('cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email, 'cityadmin_phone'=> $cityadmin_phone,'cityadmin_address'=>$address,
            'city'=>$request->city_name,
            'lat'=>$request->lat,
                'lng'=>$request->lng,
                'cca2'=>$request->cca2,
                'cca3'=>$request->cca3,
            'currency'=>$request->currency,'updated_at'=>$updated_at,'timezone'=>$request->timezone);
            }

            $update = DB::table('cityadmin')
                 ->where('cityadmin_id', $cityadmin_id)
                 ->update($value);

            if ($update) {
                return redirect()->route('city-franchise.index')->withErrors(' updated successfully');
            } else {
                return redirect()->back()->withErrors("something wents wrong.");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CityFranchise  $cityFranchise
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityFranchise $cityFranchise)
    {
        $cityadmin_id=$cityFranchise->cityadmin_id;

        $getfile=DB::table('cityadmin')
                ->where('cityadmin_id',$cityadmin_id)
                ->first();

        $cityadmin_image=$getfile->cityadmin_image;
        $cityadmin_id=$getfile->cityadmin_id;

        DB::table('vendor')->where('cityadmin_id',$cityadmin_id)->delete();
        
    	$delete=DB::table('cityadmin')->where('cityadmin_id',$cityadmin_id)->delete();
        if($delete)
        {
        
            if(file_exists($cityadmin_image)){
                unlink($cityadmin_image);
            }
         
        return redirect()->back()->withErrors('delete successfully');

        }
        else
        {
           return redirect()->back()->withErrors('unsuccessfull delete'); 
        }
    }
}
