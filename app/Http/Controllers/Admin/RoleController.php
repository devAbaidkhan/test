<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $roles=DB::table('roles')->get();
        return view('admin.role.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=DB::table('permissions')->get();
        return view('admin.role.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role =  Role::create(['name' =>$request->role]);
        $role->syncPermissions($request->permission);
        return redirect()->back()->withSuccess('Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions=DB::table('permissions')->get();
        $role_has_permissions=DB::table('role_has_permissions')->where('role_id',$role->id)->select('permission_id')->get();
        return view('admin.role.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->name=$request->role;
       $ue= $role->syncPermissions($request->permission);
        if($ue){
           // Artisan::call('cache:clear');
    
            Cache::forget('CityFranchise_has_permissions');
            Cache::forget('CountryFranchise_has_permissions');
            Cache::forget('Partner_has_permissions');
            return redirect()->back()->withSuccess('Updated Successfully');
         }
         else{
             return redirect()->back()->withErrors('Nothing to Update');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
       $re= $role->delete();
        if($re){
         
            return redirect()->back()->withSuccess('Updated Successfully');
         }
         else{
             return redirect()->back()->withErrors('Nothing to Update');
         }
    }
}
