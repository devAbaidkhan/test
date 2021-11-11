<?php

namespace App\Http\Controllers\Resturant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            $subcat= DB::table('resturant_category')
        ->where('vendor_id', $vendor->vendor_id)
        ->get();
            $product= DB::table('resturant_product')
                 ->join('resturant_category', 'resturant_product.subcat_id', '=', 'resturant_category.resturant_cat_id')
                 ->where('resturant_product.vendor_id', $vendor->vendor_id)
                 ->orderBy('resturant_product.order_no', 'ASC')
                 ->paginate(10);
            /* $currency =  DB::table('currency')
                   ->select('currency_sign')
                    ->paginate(10);  */
            return view('resturant.product.product', compact("vendor_email", "product", "vendor", "subcat"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function productCategorySearch(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            $subcat= DB::table('resturant_category')
        ->where('vendor_id', $vendor->vendor_id)
        ->get();
            $product_category=$request->product_category;
            $product= DB::table('resturant_product')
                 ->join('resturant_category', 'resturant_product.subcat_id', '=', 'resturant_category.resturant_cat_id')
                 ->where('resturant_product.vendor_id', $vendor->vendor_id)
                 ->where('subcat_id', $request->product_category)
                 ->paginate(10);
            /* $currency =  DB::table('currency')
                   ->select('currency_sign')
                    ->paginate(10);  */
            return view('resturant.product.product', compact("vendor_email", "product", "vendor", "subcat", "product_category"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    public function Addproduct(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            $subcat= DB::table('resturant_category')
                ->where('vendor_id', $vendor->vendor_id)
                ->get();
            $resturant_product_status= DB::table('resturant_product_status')
                ->get();
                
            
            return view('resturant.product.addproduct', compact("vendor_email", "subcat", "vendor", "resturant_product_status"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    
    public function AddNewproduct(Request $request)
    {
        $this->validate(
            $request,
            [
                    'product_name'=>'required',
                    'subcat_name'=>'required',
                    'price'=>'required',
                    'product_description'=>'required',
                    'product_image' => 'required',
                    'product_img' => 'required',
                      'mrp' => 'required',
                       'unit' => 'required',
                       'product_status' => 'required',

                ],
            [
                    
                    'product_name.required'=> 'Enter Product name',
                    'subcat_name.required'=>'Select Category name',
                    'price.required'=>'Enter Discount Price',
                    'product_description.required'=>'enter description about product',
                    'product_image.required'=>'enter image product',
                    'mrp.required'=>'Enter Retail Price',
                    'unit.required'=>'Enter Unit',

                ]
        );

        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
            $vendor_id=$vendor->vendor_id;
            $product_id=$request->id;
            $subcat_name=$request->subcat_name;
            $product_name=$request->product_name;
            $mrp = $request->mrp;/* retail price */
            $price=$request->price; /* discount price */
            $unit=$request->unit;
            $qty=$request->quantity;
            $old_product_image=$request->old_product_image;
            $product_description =$request->product_description;
            $date = date('d-m-Y');
            $created_at=date('d-m-Y h:i a');
            $updated_at=date('d-m-Y h:i a');
            if (!empty($request->product_image)) {
                $product_image = $request->product_image;
                $fileName = date('dmyhisa').'-'.$request->product_img->getClientOriginalName();
                $fileName = str_replace(" ", "-", $fileName);
                $folder = "images/partner_".$vendor->slug.'/product-images/';
                if (!File::exists($folder)) {
                    File::makeDirectory($folder, 0775, true, true);
                }
                $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->product_image));
                file_put_contents($folder. $fileName, $file);
           
                $product_image = $folder.$fileName;
            } else {
                $product_image =null;
            }
       
        
        

            $insert = DB::table('resturant_product')
                  ->insertGetId(['subcat_id'=>$subcat_name,'product_name'=>$product_name,'product_image'=>$product_image,
                  'created_at'=>$created_at,
                  'updated_at'=>$updated_at,
                  'vendor_id'=>$vendor_id,
                  'description'=>$product_description,
                  'order_no'=>$request->order_no,
                  'product_status'=>$request->product_status,
                  ]);
            if ($insert) {
                $add1stvarient = DB::table('resturant_variant')
                        ->insert(['product_id'=>$insert,'price'=>$mrp, 'strick_price'=>$price, 'unit'=>$unit,'vendor_id'=>$vendor_id,
                        'serving'=>$request->serving,
                        'discount_price_percentage'=>$request->discount_price_percentage,
                        ]);
                return redirect()->route('resturantproduct')->withErrors('successfully added');
            } else {
                return redirect()->back()->withErrors('something went wrong');
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    public function Editproduct(Request $request)
    {
        if (Session::has('vendor')) {
            $product_id=$request->product_id;
            $vendor_email=Session::get('vendor');
         
            $vendor=DB::table('vendor')
                ->where('vendor_email', $vendor_email)
                ->first();
            $product= DB::table('resturant_product')
                   ->leftjoin('resturant_variant', 'resturant_product.product_id', '=', 'resturant_variant.product_id')
                  ->where('resturant_product.product_id', $product_id)
                  ->first();
            $subcat=DB::table('resturant_category')
                 ->where('vendor_id', $vendor->vendor_id)
                ->get();
            $resturant_product_status= DB::table('resturant_product_status')
                ->get();
            return view('resturant.product.Editproduct', compact("vendor_email", "vendor", "product", "product_id", "subcat", "resturant_product_status"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function Updateproduct(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();

            $product_id=$request->product_id;
            $subcat_name=$request->subcat_name;
            $product_name=$request->product_name;
            $product_description=$request->product_description;
            $old_product_image=$request->old_product_image;
            $date = date('d-m-Y');
            $updated_at = date("d-m-y h:i a");
            $date=date('d-m-y');
        
            $this->validate(
                $request,
                [
                    'subcat_name'=>'required',
                    'product_img' => 'mimes:jpeg,png,jpg|max:400',
                    'old_product_image'=>'required',
                    'product_description'=>'required',
                    'product_status'=>'required',
                ],
                [
        
                    'subcat_name.required'=>'select subcat name',
                    'old_product_image.required' => 'choose picture.',
                    'product_description.required'=>'enter description',

                ]
            );

            $getImage = DB::table('resturant_product')
                     ->where('product_id', $product_id)
                    ->first();

            $image = $getImage->product_image;

            if ($request->hasFile('product_img')) {
                if (file_exists($image)) {
                    unlink($image);
                }

                $fileName = date('dmyhisa').'-'.$request->product_img->getClientOriginalName();
                $fileName = str_replace(" ", "-", $fileName);
                $folder = "images/partner_".$vendor->slug.'/product-images/';
                if (!File::exists($folder)) {
                    File::makeDirectory($folder, 0775, true, true);
                }
                $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->product_image));
                file_put_contents($folder. $fileName, $file);
           
                $product_image = $folder.$fileName;
            } else {
                $product_image = $old_product_image;
            }
            $update = DB::table('resturant_product')
                 ->where('product_id', $product_id)
                 ->update(['subcat_id'=>$subcat_name,'product_name'=>$product_name,'product_image'=>$product_image,
                 'order_no'=>$request->order_no,
                 'description'=>$product_description,
                 'product_status'=>$request->product_status,
                 'updated_at'=>$updated_at]);

            if ($update) {
                return redirect()->route('resturantproduct')->withErrors(' updated successfully');
            } else {
                return redirect()->back()->withErrors("something wents wrong.");
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function deleteproduct(Request $request)
    {
        $product_id=$request->product_id;
        $delete=DB::table('resturant_variant')->where('product_id', $request->product_id)->delete();

        if ($delete) {
            $delete=DB::table('resturant_product')->where('product_id', $request->product_id)->delete();

            return redirect()->back()->withSuccess('Deleted Successfully');
        } else {
            return redirect()->back()->withErrors('Unsuccessfull Delete');
        }
    }
    
    public function searchproduct(Request $request)
    {
        $this->validate($request, [
         'productname' => 'required',
     ]);
        $productname=$request->productname;

        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
        
            $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
            $id=$vendor->vendor_id;
            if ($productname!=null && $id!=null) {
                $product = $this->getSearch($productname, $id);


                return view('vendor.product.product', compact("vendor_email", "product", "vendor"));
            } else {
                $product= DB::table('product')
                 ->join('subcat', 'product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
                 ->where('tbl_category.vendor_id', $vendor->vendor_id)
                ->get();

                return view('vendor.product.product', compact("vendor_email", "product", "vendor"));
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function getSearch($productname, $id)
    {
        if ($productname!=null && $id!=null) {
            $od = DB::table('product')
     ->join('subcat', 'product.subcat_id', '=', 'subcat.subcat_id')
     ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
     ->where('tbl_category.vendor_id', $id)
     ->where([['product_name','=',$productname]])->get();
            return $od;
        }
    }

    public function productsortinglist(Request $request)
    {
    if(Session::has('vendor'))
     {
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email',$vendor_email)
        ->first();
        $subcat= DB::table('resturant_category')
        ->where('vendor_id', $vendor->vendor_id)
        ->get();
        $product= DB::table('resturant_product')
                 ->join('resturant_category','resturant_product.subcat_id', '=', 'resturant_category.resturant_cat_id')
                 ->where('resturant_product.vendor_id', $vendor->vendor_id)
                 ->orderBy('resturant_product.order_no','ASC')
                 ->get();
        /* $currency =  DB::table('currency')
               ->select('currency_sign')
                ->paginate(10);  */        
        return view('resturant.product.product_sorting',compact("vendor_email","product","vendor","subcat"));
	 }
	else
	 {
	    return redirect()->route('vendorlogin')->withErrors('please login first');
	 }
    }
    public function productSortingListCategorySearch(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            $subcat= DB::table('resturant_category')
        ->where('vendor_id', $vendor->vendor_id)
        ->get();
            $product_category=$request->product_category;
            $product= DB::table('resturant_product')
                 ->join('resturant_category', 'resturant_product.subcat_id', '=', 'resturant_category.resturant_cat_id')
                 ->where('resturant_product.vendor_id', $vendor->vendor_id)
                 ->where('subcat_id', $request->product_category)
                 ->paginate(10);
            /* $currency =  DB::table('currency')
                   ->select('currency_sign')
                    ->paginate(10);  */
            return view('resturant.product.product_sorting', compact("vendor_email", "product", "vendor", "subcat", "product_category"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function productSortingSave(Request $request)
    {
        for ($i=0; $i <count($request->product_id); $i++) { 
            DB::table('resturant_product')
            ->where('product_id',$request->product_id[$i])
            ->update([
                'order_no'=>$i
            ]);
        }
        return redirect()->back()->withErrors('successfully updated');
        
    }
}
