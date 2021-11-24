<?php

namespace App\Console\Commands;

use App\VendorPackage;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckPackageExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if package is expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pkgs= DB::table('vendor_packages')
            ->where('status','active')
            ->leftjoin('packages','vendor_packages.package_id','=','packages.id')
            ->select(
                'vendor_packages.created_at as pkg_date',
                'packages.days',
                'vendor_packages.id as pkg_id'
            )
            ->get();

        foreach ($pkgs as $pkg){
            $pkg_date = Carbon::parse($pkg->pkg_date)->addDays($pkg->days)->toDateString();
            $today = Carbon::now()->toDateString();
            if ($pkg_date == $today ){
                $package = VendorPackage::find($pkg->pkg_id);
                $package->status = 'expire';
                $package->save();
            }
        }
    }
}
