<?php

namespace App\Http\Controllers\Resturant;

use Illuminate\Http\Request;
use App\YourExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProducts;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;
use Illuminate\Support\Facades\Response;
use stdClass;

class BulkuploadController extends Controller
{
    public function restaurantbulkup(Request $request)
    {
        $vendor_email=Session::get('vendor');
        
        $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
        
          
        return view('resturant.product.bulkupload', compact('vendor_email', "vendor"));
    }
    
    public function restaurantimport(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
        
            $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
            $vendor_id =$vendor->vendor_id;
                    
            $this->validate(
                $request,
                [
                    
                    'select_file' => 'required'
                ],
                [
                    'select_file.required' => 'choose a csv file.'
                ]
            );
            $count=0;
            $fp = fopen($_FILES['select_file']['tmp_name'], 'r') or die("can't open file");
            while ($csv_line = fgetcsv($fp, 1024)) {
                $count++;
                if ($count == 1) {
                    continue;
                }//keep this if condition if you want to remove the first row
                for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                    $insert_csv0 = array();
                    $insert_csv0['subcat_id'] = $csv_line[0];
                    $insert_csv0['product_name'] = $csv_line[1];
                    $insert_csv0['product_image'] = $csv_line[2];
                    $insert_csv0['description'] = $csv_line[7];
                    
                    
                    $insert_csv1 = array();
                    $insert_csv1['quantity'] = $csv_line[3];
                    $insert_csv1['unit'] = $csv_line[4];
                    $insert_csv1['price'] = $csv_line[5];
                    $insert_csv1['strick_price'] = $csv_line[6];
                }
                $i++;
                $data = array(
                    'subcat_id' => $insert_csv0['subcat_id'],
                    'product_name' => $insert_csv0['product_name'],
                    'product_image' => $insert_csv0['product_image'],
                    'description' => $insert_csv0['description'],
                    'vendor_id'=>$vendor_id
                    );
                
                $inserted = DB::table('resturant_product')->insertGetId($data);
                $data1 = array(
                     'product_id'=>$inserted,
                    'quantity' => $insert_csv1['quantity'],
                    'unit' => $insert_csv1['unit'],
                    'price' => $insert_csv1['price'],
                    'strick_price' => $insert_csv1['strick_price'],
                    'vendor_id'=>$vendor_id
                    );
                $inserted1 = DB::table('resturant_variant')->insertGetId($data1);
            }
            fclose($fp) or die("can't close file");
            return back()->with('success', 'Products imported successfully.');
            return $data;
        }
    }
    public function restaurant_import_preview(Request $request)
    {
        if (!Session::has('vendor')) {
            return redirect('resturantlogin');
        }

        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
        
            $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
            $vendor_id =$vendor->vendor_id;
           
            $subcat= DB::table('resturant_category')
                    ->where('vendor_id', $vendor->vendor_id)
                    ->get();
            $this->validate(
                $request,
                [
                    
                    'select_file' => 'required'
                ],
                [
                    'select_file.required' => 'choose a csv file.'
                ]
            );
            $count=0;
            $fp = fopen($_FILES['select_file']['tmp_name'], 'r') or die("can't open file");
            $products=array();
            while ($csv_line = fgetcsv($fp, 1024)) {
                $count++;
                if ($count == 1) {
                    continue;
                }//keep this if condition if you want to remove the first row
                for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                    $products_arr=array();
                    /* $products_arr['cat_id']=$csv_line[0]; */
                    $products_arr['product_name']=$csv_line[0];
                    /* $products_arr['product_image']=$csv_line[2]; */
                    $products_arr['description']=$csv_line[1];
                  /*   $products_arr['quantity'] = $csv_line[3];
                    $products_arr['unit'] = $csv_line[4];
                    $products_arr['price'] = $csv_line[5];
                    $products_arr['strick_price'] = $csv_line[6]; */
                }
                $products[]=$products_arr;
            }
            
            // dd($products);
            fclose($fp) or die("can't close file");
            return view('resturant.product.bulkuploadpreview', compact('products','subcat'));
        }
    }
    public function restaurant_import_save(Request $request)
    {
        $vendor_email=Session::get('vendor');
        
        $vendor=DB::table('vendor')
                ->where('vendor_email', $vendor_email)
                ->first();
        $vendor_id =$vendor->vendor_id;
                
        $this->validate(
            $request,
            [
                'product_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
        );
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
        $updated_at=date('d-m-Y h:i a');

        for ($i=0; $i <count($request->product_name) ; $i++) {
            $product_image = $request->product_image[$i];
            $fileName = date('dmyhisa').'-'.$product_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $product_image->move("images/partner_".auth_partner()->vendor_id.'/product/images/', $fileName);
            $product_image = "images/partner_".auth_partner()->vendor_id.'/product/images/'.$fileName;

    
            $insert = DB::table('resturant_product')
    ->insertGetId(
        ['subcat_id'=>$request->subcat_id[$i],
        'product_name'=>$request->product_name[$i],
        'product_image'=>$product_image,
        'created_at'=>$created_at,
        'updated_at'=>$updated_at,
        'vendor_id'=>$vendor_id,
        'description'=>$request->description[$i]
        ]
    );
            /* if ($insert) {
                $add1stvarient = DB::table('resturant_variant')
                           ->insert(
                               ['product_id'=>$insert,
                               'price'=>$request->price[$i],
                               'strick_price'=>$request->strick_price[$i],
                               'unit'=>$request->unit[$i],
                               'quantity'=>$request->quantity[$i],
                               'vendor_id'=>$vendor_id
                               ]
                           );
            }else{
                return redirect()->route('restaurantbulkup')->withErrors('Variants not successfully added');
            } */
            /* echo '<pre>';
            print_r($fileName);
            echo '</pre>'; */
        }
        return redirect()->route('restaurantbulkup')->withSuccess('successfully added');
        // dd($request->all());
    }
   
    
    public function restaurantimport_varients(Request $request)
    {
        $vendor_email=Session::get('vendor');
        
        $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
        
        $this->validate(
            $request,
            [
                    
                    'select_file' => 'required'
                ],
            [
                    'select_file.required' => 'choose a csv file.'
                ]
        );
        $count=0;
        $fp = fopen($_FILES['select_file']['tmp_name'], 'r') or die("can't open file");
        while ($csv_line = fgetcsv($fp, 1024)) {
            $count++;
            if ($count == 1) {
                continue;
            }//keep this if condition if you want to remove the first row
            for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                $insert_csv1 = array();
                $insert_csv1['product_id'] = $csv_line[0];
                $insert_csv1['unit'] = $csv_line[1];
                $insert_csv1['price'] = $csv_line[2];
                $insert_csv1['strick_price'] = $csv_line[3];
            }
            $i++;
                
            $data1 = array(
                     'product_id'=>$insert_csv1['product_id'],
                    'unit' => $insert_csv1['unit'],
                    'price' => $insert_csv1['price'],
                    'strick_price' => $insert_csv1['strick_price'],
                    'vendor_id'=>$vendor->vendor_id,
                    );
            $inserted1 = DB::table('resturant_variant')->insertGetId($data1);
        }
        fclose($fp) or die("can't close file");
        return back()->with('success', 'Products Varient import successfully.');
        //return $data;
    }
    public function productdownload()
    {
        $file= public_path(). "/download/product.csv";
        return Response::download($file);
    }
    public function variantdownload()
    {
        $file= public_path(). "/download/variant.csv";
        return Response::download($file);
    }
}
