<?php

namespace App\Http\Controllers\Packages;

use App\Http\Controllers\Controller;
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
            $cityfranchises= DB::table('cityadmin')
                ->select('cityadmin.*', 'roles.name AS role_name')
                ->leftJoin('roles', 'cityadmin.role_id', '=', 'roles.id')
                ->where('cityadmin.country', $country)
                ->whereNotNull('city')
                ->orderBy('cityadmin_id', 'desc')
                ->paginate(10);

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
        dd($request->name);
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
