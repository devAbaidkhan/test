<?php

namespace App\Http\Controllers\Resturant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        
            $vendorCategory = DB::table('resturant_category')
                         ->where('vendor_id', $vendor->vendor_id)
                         ->orderBy('order_no', 'ASC')
                         ->paginate(10);
            return view('resturant.category.show_cat', compact("vendorCategory", "vendor_email", "vendor"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    public function resturantAddCategory(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendorCategory = DB::table('resturant_category')
                         ->get();
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
            return view('resturant.category.add_category', compact("vendorCategory", "vendor_email", "vendor"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    public function resturantAddNewCategory(Request $request)
    {
        if (Session::has('vendor')) {
            $category_name = $request->category_name;
            $vendor_id = $request->vendor_id;
            $created_at = Carbon::now();
            $updated_at = Carbon::now();
            $date=date('d-m-Y');
 
        
            $this->validate(
                $request,
                [
                    'category_name' => 'required',
                    'order_no' => 'required',
                ],
                [
                    'category_name.required' => 'Enter category name.',
                    'order_no.required' => 'Enter category Order Number.',
                ]
            );
    
            $insertCategory = DB::table('resturant_category')
                            ->insert([
                                'vendor_id'=>$vendor_id,
                                'cat_name'=>$category_name,
                                'order_no'=>$request->order_no
                            ]);
        
            if ($insertCategory) {
                return redirect()->route('resturantcategory')->withErrors('category added successfully');
            } else {
                return redirect()->back()->withErrors("Something wents wrong");
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    public function resturantEditCategory(Request $request)
    {
        if (Session::has('vendor')) {
            $category_id = $request->category_id;

            $category = DB::table('resturant_category')
                      ->where('resturant_cat_id', $category_id)
                      ->first();
            $vendor_email=Session::get('vendor');
            
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
       

            return view('resturant.category.update_cat', compact("category", "vendor_email", "vendor"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }

    public function resturantUpdateCategory(Request $request)
    {
        if (Session::has('vendor')) {
            $category_id = $request->category_id;
            $category_name = $request->category_name;
            $vendor_id = $request->vendor_id;
            $updated_at = Carbon::now();
            $date = date('d-m-Y');
 
            $this->validate(
                $request,
                [
                    'category_name' => 'required',
                    'order_no' => 'required',
                ],
                [
                    'category_name.required' => 'Enter category name.',
                    'order_no.required' => 'Enter order No.',
                ]
            );

        

            $updateCategory = DB::table('resturant_category')
                            ->where('resturant_cat_id', $category_id)
                            ->update([
                                 'vendor_id'=>$vendor_id,
                                'cat_name'=>$category_name,
                                'order_no'=>$request->order_no,
                            ]);
        
            if ($updateCategory) {
                return redirect()->route('resturantcategory')->withErrors('category updated successfully');
            } else {
                return redirect()->back()->withErrors("Something wents wrong");
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    
    
    
    public function resturantDeleteCategory(Request $request)
    {
        if (Session::has('vendor')) {
            $category_id=$request->category_id;
            $delete=DB::table('resturant_category')->where('resturant_cat_id', $request->category_id)->delete();

            if ($delete) {
                return redirect()->back()->withErrors('Delete successfully');
            } else {
                return redirect()->back()->withErrors('unsuccessfull delete');
            }
        } else {
            return redirect()->back()->withErrors('Delete successfully');
        }
    }

    public function categorySortingList(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
        
            $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        
            $vendorCategory = DB::table('resturant_category')
                         ->where('vendor_id', $vendor->vendor_id)
                         ->orderBy('order_no', 'ASC')
                         ->get();
            return view('resturant.category.category_sorting', compact("vendorCategory", "vendor_email", "vendor"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function categorySortingSave(Request $request)
    {
        for ($i=0; $i <count($request->resturant_cat_id); $i++) { 
            DB::table('resturant_category')
            ->where('resturant_cat_id',$request->resturant_cat_id[$i])
            ->update([
                'order_no'=>$i
            ]);
        }
        return redirect()->back()->withErrors('successfully updated');
    }
}
