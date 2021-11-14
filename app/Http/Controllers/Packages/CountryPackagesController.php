<?php

namespace App\Http\Controllers\Packages;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CountryPackagesController extends Controller
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
            $country=   Session::get('franchise_admin')->country;
            $packages= DB::table('packages')->where('country',$country)->orderBy('id','desc')->paginate(10);

        return view('packages.country-packages.browse',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role=Session::get('role');
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
            ->where('cityadmin_email', $cityadmin_email)
            ->first();
        $country=   Session::get('franchise_admin')->country;
        return view('packages.country-packages.create',get_defined_vars());
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
            'name' => 'required',
            'type' => 'required',
            'order_quantity' => 'required',
            'days' => 'required',
            'price' => 'required_if:type,subscription',
            'commission' => 'required_if:type,commission',
            'price' => 'required_if:type,commission_subscription',
            'commission' => 'required_if:type,commission_subscription',
            'dinein' => 'required',
            'delivery' => 'required',
            'take_away' => 'required',
        ]);

        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
            ->where('cityadmin_email', $cityadmin_email)
            ->first();
        $pkg = new Package();
        $pkg->name = $request->name;
        $pkg->type = $request->type;
        $pkg->orders_quantity = $request->order_quantity;

        if ($request->type == 'subscription'){
            $pkg->price = $request->price;
        }elseif ($request->type == 'commission'){
            $pkg->commission = $request->commission;
        }elseif ($request->type == 'commission_subscription'){
            $pkg->price = $request->price;
            $pkg->commission = $request->commission;
        }

        $pkg->days = $request->days;
        $pkg->dinein = $request->dinein;
        $pkg->delivery = $request->delivery;
        $pkg->take_away = $request->take_away;
        $pkg->country = $cityadmin->country;

        $pkg->save();
      
        return redirect('franchise-admin/packages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role=Session::get('role');
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
            ->where('cityadmin_email', $cityadmin_email)
            ->first();
        $country=   Session::get('franchise_admin')->country;


        return view('packages.country-packages.create',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role=Session::get('role');
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
            ->where('cityadmin_email', $cityadmin_email)
            ->first();
        $country=   Session::get('franchise_admin')->country;
        $package= DB::table('packages')->find($id);

        return view('packages.country-packages.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'order_quantity' => 'required',
            'days' => 'required',
            'price' => 'required_if:type,subscription',
            'commission' => 'required_if:type,commission',
            'price' => 'required_if:type,commission_subscription',
            'commission' => 'required_if:type,commission_subscription',
            'dinein' => 'required',
            'delivery' => 'required',
            'take_away' => 'required',
        ]);

        $pkg = Package::find($id);
        $pkg->name = $request->name;
        $pkg->type = $request->type;
        $pkg->orders_quantity = $request->order_quantity;

        if ($request->type == 'subscription'){
            $pkg->price = $request->price;
        }elseif ($request->type == 'commission'){
            $pkg->commission = $request->commission;
        }elseif ($request->type == 'commission_subscription'){
            $pkg->price = $request->price;
            $pkg->commission = $request->commission;
        }

        $pkg->days = $request->days;
        $pkg->dinein = $request->dinein;
        $pkg->delivery = $request->delivery;
        $pkg->take_away = $request->take_away;
        $pkg->save();


        return redirect('franchise-admin/packages')->with(['msg'=>'Updated Successfully..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $package =  Package::find($request->delete_item);
        $package->delete();
        return redirect('franchise-admin/packages')->with(['msg'=>'Item  Deleted Successfully..']);
    }
}
