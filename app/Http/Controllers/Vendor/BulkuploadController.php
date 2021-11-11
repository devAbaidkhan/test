<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\YourExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProducts;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;
use Illuminate\Support\Facades\Response;

class BulkuploadController extends Controller
{
   public function bulkup(Request $request)
    {
       $vendor_email=Session::get('vendor');
        
                    $vendor=DB::table('vendor')
                    ->where('vendor_email',$vendor_email)
                    ->first();
        
          
    	return view('vendor.product.bulkupload', compact('vendor_email',"vendor"));
    }
    
        public function import(Request $request)
    {
        	if(Session::has('vendor'))
          {
        $vendor_email=Session::get('vendor');
        
                    $vendor=DB::table('vendor')
                    ->where('vendor_email',$vendor_email)
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
            $fp = fopen($_FILES['select_file']['tmp_name'],'r') or die("can't open file");
            while($csv_line = fgetcsv($fp,1024))
            {
                $count++;
                if($count == 1)
                {
                    continue;
                }//keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {

                    $insert_csv0 = array();
                    $insert_csv0['subcat_id'] = $csv_line[0];
                    $insert_csv0['product_name'] = $csv_line[1];
                    $insert_csv0['product_image'] = $csv_line[2];
                    
                    
                     $insert_csv1 = array();
                    $insert_csv1['quantity'] = $csv_line[3];
                    $insert_csv1['unit'] = $csv_line[4];
                    $insert_csv1['price'] = $csv_line[5];
                    $insert_csv1['strick_price'] = $csv_line[6];
                    $insert_csv1['description'] = $csv_line[7];
                    $insert_csv1['varient_image'] = $csv_line[2];
                    $insert_csv1['stock'] = $csv_line[8];
                   
                }
                $i++;
                $data = array(
                    'subcat_id' => $insert_csv0['subcat_id'],
                    'product_name' => $insert_csv0['product_name'],
                    'product_image' => $insert_csv0['product_image'],
                    'vendor_id'=>$vendor_id
                    );
                
                $inserted = DB::table('product')->insertGetId($data);
                 $data1 = array(
                     'product_id'=>$inserted,
                    'quantity' => $insert_csv1['quantity'],
                    'unit' => $insert_csv1['unit'],
                    'price' => $insert_csv1['price'],
                    'strick_price' => $insert_csv1['strick_price'],
                    'description' => $insert_csv1['description'],
                    'varient_image' => $insert_csv1['varient_image'],
                    'stock' => $insert_csv1['stock'],
                    'vendor_id'=>$vendor_id
                    );   
                $inserted1 = DB::table('product_varient')->insertGetId($data1);
                
               
            }
            fclose($fp) or die("can't close file");
          return back()->with('success', 'Products imported successfully.');
            return $data;
        // var_dump($inserted1);
   } 
    }
    
    
    
        public function import_varients(Request $request)
    {
        $vendor_email=Session::get('vendor');
        
                    $vendor=DB::table('vendor')
                    ->where('vendor_email',$vendor_email)
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
            $fp = fopen($_FILES['select_file']['tmp_name'],'r') or die("can't open file");
            while($csv_line = fgetcsv($fp,1024))
            {
                $count++;
                if($count == 1)
                {
                    continue;
                }//keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {
                    $insert_csv1 = array();
                    $insert_csv1['product_id'] = $csv_line[0];
                    $insert_csv1['quantity'] = $csv_line[1];
                    $insert_csv1['unit'] = $csv_line[2];
                    $insert_csv1['price'] = $csv_line[3];
                    $insert_csv1['strick_price'] = $csv_line[4];
                    $insert_csv1['description'] = $csv_line[5];
                    $insert_csv1['varient_image'] = $csv_line[6];
                    $insert_csv1['stock'] = $csv_line[7];
                   
                }
                $i++;
                
                 $data1 = array(
                     'product_id'=>$insert_csv1['product_id'],
                    'quantity' => $insert_csv1['quantity'],
                    'unit' => $insert_csv1['unit'],
                    'price' => $insert_csv1['price'],
                    'strick_price' => $insert_csv1['strick_price'],
                    'description' => $insert_csv1['description'],
                    'varient_image' => $insert_csv1['varient_image'],
                    'stock'=> $insert_csv1['stock'],
                    'vendor_id'=>$vendor->vendor_id,
                    );   
                $inserted1 = DB::table('product_varient')->insertGetId($data1);
            }
            fclose($fp) or die("can't close file");
          return back()->with('success', 'Products Varient import successfully.');
            return $data;
        // var_dump($inserted1);
   } 
    public function productdownload(){
    $file= public_path(). "/download/product.csv";
        return Response::download($file);
}
    public function variantdownload(){
    $file= public_path(). "/download/variant.csv";
        return Response::download($file);
}
}
