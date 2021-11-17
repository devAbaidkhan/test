<?php

namespace App\Http\Controllers\Packages;

use App\VendorPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PartnerPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

            $packages= DB::table('packages')->where('country',$cityadmin->country)->orderBy('id','desc')->get();

            return view('packages.partner-packages.create',get_defined_vars());
        } else {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
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

        $this->validate($request, [
            'partner' => 'required',
            'package' => 'required',
        ]);

        $pkg = new VendorPackage();
        $pkg->vend_id = $request->partner;
        $pkg->package_id = $request->package;
        $pkg->status  = 'active';
        $pkg->activation_date  = Carbon::now();
        $pkg->save();
        return redirect('franchise-admin/partner/packages/create')->with(['msg'=>'Activated Successfully..']);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
