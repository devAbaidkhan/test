<?php

namespace App\Http\Controllers\Cityadmin;

use App\Campaign;
use App\CampaignCity;
use App\CampaignType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
        $campaigns=Campaign::orderBy('id', 'DESC')->paginate(5);
        return view('cityadmin.campaign.index', get_defined_vars());
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
        $campaign_types= CampaignType::active()->get();
        $cities= DB::table('cityadmin')
        ->where('country', $cityadmin->country)
        ->where('role_id', 2)
        ->select('city')
        ->get();
        return view('cityadmin.campaign.create', get_defined_vars());
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
            'title' => 'required',
            'campaign_type_id' => 'required',
            'description' => 'required',
            'banner' => 'required',
            'campaign_city' => 'required',
            'banner' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
       
        $banner_image="";
        if ($request->has('banner')) {
            $fileName = date('dmyhisa').'-'.$request->banner->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $folder = "images/campaigns/banner-images/";
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0775, true, true);
            }
            $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->banner_image));
            file_put_contents($folder. $fileName, $file);
            $banner_image = $folder.$fileName;
        }
        $data=[
            'title'=>$request->title,
            'description'=>$request->description,
            'banner'=>$banner_image,
            'campaign_type_id'=>$request->campaign_type_id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ];

        
        $campaign= Campaign::create($data);
        if ($campaign) {
            for ($i=0; $i < count($request->campaign_city); $i++) {
                DB::table('campaign_cities')->insert([
               'campaign_id'=>$campaign->id,
               'city'=>$request->campaign_city[$i]
           ]);
            }
        }
        return redirect()->route('campaign.index')->withErrors('successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email', $cityadmin_email)
        ->first();
        $campaign_types= CampaignType::active()->get();
        $cities= DB::table('cityadmin')
        ->where('country', $cityadmin->country)
        ->where('role_id', 2)
        ->select('city')
        ->get();
        return view('cityadmin.campaign.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $this->validate($request, [
            'title' => 'required',
            'campaign_type_id' => 'required',
            'description' => 'required',
            'banner' => 'required',
            'campaign_city' => 'required',
            'banner' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
       
        $banner_image=$request->old_banner_image;
        if ($request->hasFile('banner')) {
            if (file_exists($banner_image)) {
                unlink($banner_image);
            }
            $fileName = date('dmyhisa').'-'.$request->banner->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $folder = "images/campaigns/banner-images/";
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0775, true, true);
            }
            $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->banner_image));
            file_put_contents($folder. $fileName, $file);
            $banner_image = $folder.$fileName;
        }
        $campaign->title=$request->title;
        $campaign->description=$request->description;
        $campaign->banner=$banner_image;
        $campaign->campaign_type_id=$request->campaign_type_id;
        $campaign->save();
        if ($campaign) {
            CampaignCity::where('campaign_id', $campaign->id)->delete();
            for ($i=0; $i < count($request->campaign_city); $i++) {
                DB::table('campaign_cities')->insert([
               'campaign_id'=>$campaign->id,
               'city'=>$request->campaign_city[$i]
           ]);
            }
        }
        return redirect()->route('campaign.index')->withErrors('successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
