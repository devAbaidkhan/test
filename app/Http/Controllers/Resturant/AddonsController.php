<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AddonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $restaurant_addons = DB::table('restaurant_addons')->where('vendor_id', $vendor->vendor_id)->orderBy('order_no', 'ASC')->paginate(10);
        return view('resturant.addons.show_addon', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resturant.addons.addaddon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $vendor_id=$vendor->vendor_id;
        $this->validate(
            $request,
            [
            'addon_name'=>'required',
            'addon_price'=>'required',
            'order_no'=>'required',
        ]
        );
        $insert =  DB::table('restaurant_addons')
                        ->insert([
                            'addon_name'=>$request->addon_name,
                            'addon_price'=>$request->addon_price,
                            'order_no'=>$request->order_no,
                            'vendor_id'=>$vendor_id]);
        if ($insert) {
            return redirect()->route('restaurant_addons.index')->withErrors('Successfully Added');
        } else {
            return redirect()->back()->withErrors('something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
         ->where('vendor_email', $vendor_email)
         ->first();

        $restaurant_addon= DB::table('restaurant_addons')->where('addon_id', $id)->first();
        return view('resturant.addons.Editaddon', compact("restaurant_addon", "vendor", "vendor_email"));
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
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
         ->where('vendor_email', $vendor_email)
         ->first();
        
        $addon_id = $id;
        $addon_name = $request->addon_name;
        $addon_price=$request->addon_price;

        $varient_update = DB::table('restaurant_addons')
        ->where('addon_id', $addon_id)
        ->update(['addon_name'=>$addon_name, 'addon_price'=>$addon_price,
        'order_no'=>$request->order_no,
        'vendor_id'=>$vendor->vendor_id]);

        if ($varient_update) {
            return redirect()->route('restaurant_addons.index')->withErrors('Updated Successfully');
        } else {
            return redirect()->back()->withErrors("Something Wents Wrong.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addon_id=$id;

        $delete=DB::table('restaurant_addons')->where('addon_id', $addon_id)->delete();
        if ($delete) {
            return redirect()->back()->withErrors('Deleted Successfully');
        } else {
            return redirect()->back()->withErrors('Unsuccessfull Delete');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sortinglist()
    {
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $restaurant_addons = DB::table('restaurant_addons')->where('vendor_id', $vendor->vendor_id)->orderBy('order_no', 'ASC')->get();
        return view('resturant.addons.addons_sorting', get_defined_vars());
    }

    public function sortingsave(Request $request)
    {
        for ($i=0; $i <count($request->addon_id); $i++) { 
            DB::table('restaurant_addons')
            ->where('addon_id',$request->addon_id[$i])
            ->update([
                'order_no'=>$i
            ]);
        }
        return redirect()->back()->withErrors('successfully updated');
    }
}
