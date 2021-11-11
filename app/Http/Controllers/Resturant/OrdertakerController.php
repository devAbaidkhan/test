<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use App\Ordertaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OrdertakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
            ->where('vendor_email', $vendor_email)
            ->first();
        
            $ordertakers= Ordertaker::where('vendor_id', $vendor->vendor_id)
            ->orderBy('id', 'DESC')
            ->paginate(10);
            
            return view('resturant.ordertaker.index', get_defined_vars());
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendorCategory = DB::table('resturant_category')
                         ->get();
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            return view('resturant.ordertaker.create', compact("vendorCategory", "vendor_email", "vendor"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'phone' => 'required',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
            ],
        );
      $status=  Ordertaker::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'vendor_id'=>auth_partner()->vendor_id,
        ]);
        if ($status) {
            return redirect()->route('restautrant_ordertaker.index')->withErrors('Ordertaker added successfully');
        } else {
            return redirect()->back()->withErrors("Something wents wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ordertaker  $ordertaker
     * @return \Illuminate\Http\Response
     */
    public function show(Ordertaker $ordertaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ordertaker  $ordertaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordertaker $restautrant_ordertaker)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendorCategory = DB::table('resturant_category')
                         ->get();
            $vendor=DB::table('vendor')
            ->where('vendor_email', $vendor_email)
            ->first();
            $ordertaker=$restautrant_ordertaker;
            return view('resturant.ordertaker.update', compact("vendorCategory", "vendor_email", "vendor","ordertaker"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ordertaker  $ordertaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordertaker $restautrant_ordertaker)
    {
        check_vendor();
        $restautrant_ordertaker->name=$request->name;
        $restautrant_ordertaker->phone=$request->phone;
        $restautrant_ordertaker->email=$request->email;

        if(!empty($request->password) && !empty($request->password_confirmation))
        {
            $this->validate(
                $request,
                [
                    'password' => 'required|min:8|confirmed',
                    'password_confirmation' => 'required|min:8',
                ],
            );
            $restautrant_ordertaker->password=Hash::make($request->password);
        }
       
        if ($restautrant_ordertaker->save()) {
            return redirect()->route('restautrant_ordertaker.index')->withErrors('Updated successfully');
        } else {
            return redirect()->back()->withErrors('unsuccessfull delete');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ordertaker  $ordertaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordertaker $restautrant_ordertaker)
    {
        if ($restautrant_ordertaker->delete()) {
            return redirect()->back()->withErrors('Delete successfully');
        } else {
            return redirect()->back()->withErrors('unsuccessfull delete');
        }
    }

}
