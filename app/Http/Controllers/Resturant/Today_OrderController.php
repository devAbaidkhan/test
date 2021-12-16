<?php

namespace App\Http\Controllers\Resturant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Today_OrderController extends Controller
{
    public function today_order_restaurant(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');

            $vendor=DB::table('vendor')
                ->where('vendor_email', $vendor_email)
                ->first();
                
            $currentDate = date('Y-m-d');
            $day = 1;
            $current2 = date('d-m-Y', strtotime($currentDate.' + '.$day.' days'));
                
            $vendor_id = $vendor->vendor_id;
            return view('resturant.oder_incentive.today_order');
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function today_order_restaurant_list(Request $request)
    {
        $vendor_email=Session::get('vendor');

        $vendor=DB::table('vendor')
                ->where('vendor_email', $vendor_email)
                ->first();
        $columns = array(
            0 => 'id',
            1 => 'cart_no',
            2 => 'total_product_price',
            3 => 'delivery_charges',
            4 => 'net_amount',
            5 => 'order_status',
            6 => 'order_type',
            7 => 'created_at',
            );
        $totalData = DB::table('orders')
            ->where('vendor_id', $vendor->vendor_id)
            ->leftJoin('order_status', 'orders.order_status', '=', 'order_status.id')
            ->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
    
        if (empty($request->input('search.value'))) {
            $results = DB::table('orders')
                ->where('vendor_id', $vendor->vendor_id)
                ->leftJoin('order_status', 'orders.order_status', '=', 'order_status.id')
                ->select('orders.id', 'orders.cart_no', 'orders.total_product_price', 'orders.delivery_charges', 'orders.net_amount', 'orders.created_at', 'orders.updated_at', 'orders.currency', 'order_status.name AS order_status',"orders.order_type")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();
        } else {
            $search = $request->input('search.value');
    
            $results =  DB::table('orders')
                ->where('vendor_id', $vendor->vendor_id)
                ->leftJoin('order_status', 'orders.order_status', '=', 'order_status.id')
                ->select('orders.id', 'orders.cart_no', 'orders.total_product_price', 'orders.delivery_charges', 'orders.net_amount', 'orders.created_at', 'orders.updated_at', 'orders.currency', 'order_status.name AS order_status',"orders.order_type")
                ->where('cart_no', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
    
            $totalFiltered = DB::table('orders')
                ->where('vendor_id', $vendor->vendor_id)
                ->leftJoin('order_status', 'orders.order_status', '=', 'order_status.id')
                ->select('orders.id', 'orders.cart_no', 'orders.total_product_price', 'orders.delivery_charges', 'orders.net_amount', 'orders.created_at', 'orders.updated_at', 'orders.currency', 'order_status.name AS order_status',"orders.order_type")
                ->where('cart_no', 'LIKE', "%{$search}%")
                ->count();
        }
        $data = array();
        if (!empty($results)) {
            foreach ($results as $key=>$row) {
                $nestedData['id'] = $key+1;
                $nestedData['cart_no'] = $row->cart_no;
                $nestedData['total_product_price'] = $row->currency.' '.$row->total_product_price;
                $nestedData['delivery_charges'] = $row->currency.' '.$row->delivery_charges;
                $nestedData['net_amount'] = $row->currency.' '.$row->net_amount;
                $nestedData['order_status'] = $row->order_status;
                $nestedData['order_type'] = $row->order_type;
                $nestedData['created_at'] = date("d-M-Y h:i:s a",strtotime($row->created_at)) ;
                $ordrid=$row->id;
                $link=route("order_restaurant_detail", ["ordrid"=>$ordrid]);
                $csrf=csrf_token();

                if ( strtolower($row->order_status) == 'pending'){
                $chat = '<a href='.url("restaurant/chat/".$ordrid).'><i class="fa fa-comments fa-lg text-primary"></i></a>';
            }else{
                    $chat = '';
                }

                $nestedData['options'] = "
			<a href='$link' title='Edit' class='edit_data mr-2' style='font-size: 18px'><i class='fa fa-edit'></i></a>
			".$chat;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );
        echo json_encode($json_data);
    }
    public function order_restaurant_detail($orderid)
    {
        if (!Session::has('vendor')) {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
        $vendor_email=Session::get('vendor');
        $vendor=DB::table('vendor')
        ->where('vendor_email', $vendor_email)
        ->first();
        $vendor_id = $vendor->vendor_id;

        $order=DB::table('orders')->where('orders.id', $orderid)->where('orders.vendor_id', $vendor_id)
        ->leftJoin('tbl_user', 'orders.user_id', '=', 'tbl_user.id')
        ->leftJoin('user_address', 'orders.address_id', '=', 'user_address.id')
        ->select(
            'orders.id',
            'orders.cart_no',
            'orders.user_id',
            'orders.total_product_price',
            'orders.delivery_charges',
            'orders.net_amount',
            'orders.currency',
            'tbl_user.name AS user_name',
            'user_address.address AS user_address',
            'tbl_user.phone AS user_phone',
            'orders.created_at',
            'orders.order_status',
            'orders.user_order_suggestion',
            'orders.cancelation_msg',
            'orders.delivery_boy_id',
            'orders.order_type',
        )
        ->first();

        $order_details=DB::table('order_details')->where('order_id', $order->id)
        ->join('resturant_product', 'order_details.product_id', '=', 'resturant_product.product_id')
        ->join('resturant_variant', 'order_details.variant_id', '=', 'resturant_variant.variant_id')
        ->select('order_details.id AS order_details_id', 'order_details.product_id', 'order_details.variant_id', 'order_details.unit AS order_details_unit', 'order_details.order_description', 'order_details.price AS order_details_price', 'order_details.product_quantity', 'order_details.total_price', 'order_details.created_at', 'resturant_product.product_name', 'resturant_product.product_image', 'resturant_variant.quantity AS resturant_variant_quantity', 'resturant_variant.unit AS resturant_variant_unit', 'resturant_variant.price AS resturant_variant_price',
        'order_details.addon_price',
        'order_details.is_campaign_product',
        'order_details.campaign_vendor_product_id',
        )
        ->get();

        $total_orders= DB::table('orders')
        ->where('user_id',$order->user_id)
        ->count();
       $pending_orders= DB::table('orders')
        ->where('user_id',$order->user_id)
        ->where('order_status',1)
        ->count();
       $completed_orders= DB::table('orders')
        ->where('user_id',$order->user_id)
        ->where('order_status',3)
        ->count();
       $canceled_orders= DB::table('orders')
        ->where('user_id',$order->user_id)
        ->where('order_status',3)
        ->count();
       $disputed_orders= DB::table('orders')
        ->where('user_id',$order->user_id)
        ->where('order_status',5)
        ->count();
        $order_status=DB::table('order_status')->get();
        $delivery_boys=DB::table('delivery_boy')->where('vendor_id',$vendor_id)->get();

        return view('resturant.oder_incentive.order_details', compact('order', 'order_details', 'order_status','delivery_boys','completed_orders','disputed_orders','total_orders','pending_orders','canceled_orders'));
    }
    public function change_order_restaurant_status(Request $request)
    {
        $order_type=$request->order_type;
        $order_confirmed=$request->order_confirmed;
        $data=array(
            'order_status'=>$request->order_status,
        );
        if ($request->order_status==3) {
            $data=  array_merge($data, [
                'cancelation_msg'=>$request->cancelation_msg,
                'canceled_at'=>now()]);
        }
        $update=  DB::table('orders')->where('id', $request->order_id)
        ->update($data);
        if ($update) {
            $order= DB::table('orders')->where('id', $request->order_id)->first();
            $user=DB::table('tbl_user')->where('id', $order->user_id)->first();
            $fcm_token=array($user->fcm_token);
            if ($request->order_status==2) {
                $msg= $order_type=='pickup'?"Preparing your order now, please pick it in $order_confirmed minutes":"Preparing your order now, will be delivered in $order_confirmed minutes";
                FCM_Notification($fcm_token, 'Order Confirmed', $msg);
            } elseif ($request->order_status==3) {
                FCM_Notification($fcm_token, 'Order Completed', 'Your Order is Completed');
            } elseif ($request->order_status==4) {
                FCM_Notification($fcm_token, 'Your order is cancelled Because of Following Reason', $request->cancelation_msg);
            } elseif ($request->order_status==5) {
                FCM_Notification($fcm_token, 'Order Disputed', "Your Order Is Disputed By Restrurent");
            }
            return response()->json(['status' => 'success', 'msg' => 'Order Status Changed Successfully']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Opps!! Someting Wrong']);
        }
    }
    public function next_day(Request $request)
    {
        if (Session::has('vendor')) {
            $currentDate = date('Y-m-d');
            $day = 1;
            $end = date('Y-m-d', strtotime($currentDate.' + '.$day.' days'));
         
            $vendor_email=Session::get('vendor');

            $vendor=DB::table('vendor')
                ->where('vendor_email', $vendor_email)
                ->first();
            $vendor_id = $vendor->vendor_id;
            $nextdayorder  =   DB::table('orders')
                            ->join('tbl_user', 'orders.user_id', '=', 'tbl_user.user_id')
                            ->join('user_address', 'orders.address_id', '=', 'user_address.address_id')
                            ->join('area', 'user_address.area_id', '=', 'area.area_id')
                            ->join('vendor_area', 'area.area_id', '=', 'vendor_area.area_id')
                       ->join('vendor', 'vendor_area.vendor_id', '=', 'vendor.vendor_id')
                            ->leftJoin('delivery_boy', 'orders.dboy_id', '=', 'delivery_boy.delivery_boy_id')
                            ->select('area.area_id', 'orders.order_id', 'orders.order_id', 'orders.user_id', 'orders.delivery_date', 'tbl_user.user_name', 'orders.dboy_id', 'orders.delivery_charge', 'orders.total_price', 'orders.total_products_mrp', 'orders.delivery_charge', 'delivery_boy.delivery_boy_name', 'orders.dboy_id', 'orders.order_status', 'orders.cart_id', 'orders.delivery_date', 'user_address.user_number', 'user_address.user_name', 'user_address.address', 'orders.time_slot', 'orders.delivery_charge', 'orders.paid_by_wallet', 'orders.rem_price', 'orders.price_without_delivery', 'orders.coupon_discount')
                             ->whereDate('orders.delivery_date', $end)
                            ->where('vendor.vendor_id', $vendor_id)
                            ->orderBy('user_id')
                            ->get();
        
            $details  =   DB::table('orders')
                        ->join('order_details', 'orders.cart_id', '=', 'order_details.order_cart_id')
                        ->join('product_varient', 'order_details.varient_id', '=', 'product_varient.varient_id')
                        ->join('product', 'product_varient.product_id', '=', 'product.product_id')
                        ->join('user_address', 'orders.address_id', '=', 'user_address.address_id')
                       ->join('area', 'user_address.area_id', '=', 'area.area_id')
                       ->join('vendor_area', 'area.area_id', '=', 'vendor_area.area_id')
                       ->join('vendor', 'vendor_area.vendor_id', '=', 'vendor.vendor_id')
                        ->select('product.product_name', 'product_varient.price', 'product_varient.unit', 'product_varient.strick_price', 'product_varient.varient_image', 'order_details.store_order_id', 'orders.cart_id', 'order_details.qty', 'order_details.quantity', 'order_details.unit')
                       ->where('vendor.vendor_id', $vendor_id)
                       ->get();
        
   
            $vendordelivery_boy =  DB::table('delivery_boy')
                          ->join('delivery_boy_area', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_area.delivery_boy_id')
                          ->select('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_name', 'delivery_boy_area.area_id')
                            ->GroupBy('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_name', 'delivery_boy_area.area_id')
                            ->where('delivery_boy.delivery_boy_status', 'online')
                            ->where('delivery_boy.vendor_id', $vendor_id)
                            ->get();
            $cityadmindelivery_boy =  DB::table('delivery_boy')
                            ->join('delivery_boy_area', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_area.delivery_boy_id')
                            ->join('delivery_boy_vendor', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_vendor.delivery_boy_id')
                            ->select('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_name', 'delivery_boy_area.area_id')
                            ->GroupBy('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_name', 'delivery_boy_area.area_id')
                            ->where('delivery_boy.delivery_boy_status', 'online')
                            ->where('delivery_boy_vendor.vendor_id', $vendor_id)
                            ->get();
            $arr1 = json_decode($vendordelivery_boy);
            $arr2 = json_decode($cityadmindelivery_boy);
            $delivery_boy = array_merge($arr1, $arr2);
            if (count($delivery_boy)>0) {
                foreach ($delivery_boy as $delivery_boy2) {
                    $boy_area_id=$delivery_boy2->area_id;
                }
            } else {
                $boy_area_id='N/A';
            }
           
                            
            return view('vendor.oder_incentive.next_day_order', compact("vendor_email", "details", "vendor", "nextdayorder", "delivery_boy", "boy_area_id"));
        } else {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
        }
    }
      
    public function resturant_complete_order(Request $request)
    {
        if (Session::has('vendor')) {
            $currentDate = date('Y-m-d');
            $day = 1;
            $end = date('Y-m-d', strtotime($currentDate.' + '.$day.' days'));
         
            $vendor_email=Session::get('vendor');

            $vendor=DB::table('vendor')
                ->where('vendor_email', $vendor_email)
                ->first();
            $vendor_id = $vendor->vendor_id;
            $nextdayorder  =   DB::table('orders')
                            ->join('tbl_user', 'orders.user_id', '=', 'tbl_user.user_id')
                            ->join('user_address', 'orders.address_id', '=', 'user_address.address_id')
                            ->join('area', 'user_address.area_id', '=', 'area.area_id')
                           
                            ->join('vendor', 'orders.vendor_id', '=', 'vendor.vendor_id')
                            ->leftJoin('delivery_boy', 'orders.dboy_id', '=', 'delivery_boy.delivery_boy_id')
                            ->select('area.area_id', 'orders.order_id', 'orders.order_id', 'orders.user_id', 'orders.delivery_date', 'tbl_user.user_name', 'orders.dboy_id', 'orders.delivery_charge', 'orders.total_price', 'orders.total_products_mrp', 'orders.delivery_charge', 'delivery_boy.delivery_boy_name', 'orders.dboy_id', 'orders.order_status', 'orders.cart_id', 'orders.delivery_date', 'user_address.user_number', 'user_address.user_name', 'user_address.address', 'orders.time_slot', 'orders.delivery_charge', 'orders.paid_by_wallet', 'orders.rem_price', 'orders.price_without_delivery', 'orders.coupon_discount')
                   
                            ->where('orders.vendor_id', $vendor_id)
                            ->whereDate('orders.delivery_date', $currentDate)
                            ->orderBy('user_id')
                            ->get();
        
            $details  =   DB::table('orders')
                        ->join('order_details', 'orders.cart_id', '=', 'order_details.order_cart_id')
                        ->join('resturant_variant', 'order_details.varient_id', '=', 'resturant_variant.variant_id')
                        ->join('resturant_product', 'resturant_variant.product_id', '=', 'resturant_product.product_id')
                        ->join('restaurant_addons', 'resturant_product.product_id', '=', 'restaurant_addons.product_id')
                        ->join('user_address', 'orders.address_id', '=', 'user_address.address_id')
                       ->join('area', 'user_address.area_id', '=', 'area.area_id')
                       ->join('vendor_area', 'area.area_id', '=', 'vendor_area.area_id')
                       ->join('vendor', 'vendor_area.vendor_id', '=', 'vendor.vendor_id')
                        ->select('resturant_product.product_name', 'resturant_variant.price', 'resturant_variant.unit', 'resturant_variant.strick_price', 'resturant_product.product_image', 'order_details.store_order_id', 'orders.cart_id', 'order_details.qty', 'order_details.quantity', 'order_details.unit')
                       ->where('vendor.vendor_id', $vendor_id)
                       ->get();
        
   
            $vendordelivery_boy =  DB::table('delivery_boy')
                          ->join('delivery_boy_area', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_area.delivery_boy_id')
                          ->select('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_name', 'delivery_boy_area.area_id')
                            ->GroupBy('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_name', 'delivery_boy_area.area_id')
                            ->where('delivery_boy.delivery_boy_status', 'online')
                            ->where('delivery_boy.vendor_id', $vendor_id)
                            ->get();
            $cityadmindelivery_boy =  DB::table('delivery_boy')
                              ->join('delivery_boy_area', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_area.delivery_boy_id')
                              ->join('delivery_boy_vendor', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_vendor.delivery_boy_id')
                              ->select('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_name', 'delivery_boy_area.area_id')
                              ->GroupBy('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_name', 'delivery_boy_area.area_id')
                              ->where('delivery_boy.delivery_boy_status', 'online')
                              ->where('delivery_boy_vendor.vendor_id', $vendor_id)
                              ->get();
            $arr1 = json_decode($vendordelivery_boy);
            $arr2 = json_decode($cityadmindelivery_boy);
            $delivery_boy = array_merge($arr1, $arr2);
                            
            if (count($delivery_boy)>0) {
                foreach ($delivery_boy as $delivery_boy2) {
                    $boy_area_id=$delivery_boy2->area_id;
                }
            } else {
                $boy_area_id='N/A';
            }
           
                            
            return view('resturant.oder_incentive.complete_order', compact("vendor_email", "details", "vendor", "nextdayorder", "delivery_boy", "boy_area_id"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
      
      
    public function resturant_assigned_order(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $vendor=DB::table('vendor')
                        ->where('vendor_email', $vendor_email)
                        ->first();
   
            $delivery_boy = $request->delivery_boy_name;
   
            $order_id = $request->order_id;
            $update = DB::table('orders')
                  ->where('order_id', $order_id)
                  ->update(['dboy_id'=>$delivery_boy,
                  'order_status'=>"Confirmed"
                  ]);
                  
               
             
            if ($update) {
               
                
                return redirect()->back()->withErrors('Delivery boy assigned successfully');
            } else {
                return redirect()->back()->withErrors("Something wents wrong");
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }

    public function order_details(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');

            $vendor=DB::table('vendor')
                ->where('vendor_email', $vendor_email)
                ->first();
                
            $vendor_id = $vendor->vendor_id;
            $order_cart_id = $request->store_order_id;

            $details  =   DB::table('order_details')
                        ->join('product_varient', 'order_details.varient_id', '=', 'product_varient.varient_id')
                        ->join('product', 'product_varient.product_id', '=', 'product.product_id')
                        ->select('product.product_name', 'product_varient.unit', 'product_varient.quantity', 'product_varient.varient_image')
                            ->where('order_details.store_order_id', $order_cart_id)
                            ->get();
         
   
            return view('vendor.oder_incentive.today_order', compact("vendor_email", "details", "vendor", "todayorder", "delivery_boy"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
      
    public function low_stock(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
    
            $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
                    
            $product = DB::table('product_varient')
                         ->join('product', 'product_varient.product_id', '=', 'product.product_id')
                     
                      ->where('product.vendor_id', $vendor->vendor_id)
                      ->orderBy('product_varient.stock', 'ASC')
                         ->paginate(10);
            
            return view('vendor.stock.low_stock', compact("vendor_email", "vendor", "product"));
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
      
    public function update_stock(Request $request)
    {
        if (Session::has('vendor')) {
            $vendor_email=Session::get('vendor');
            $varient_id = $request->varient_id;
            $st = $request->st;
            $vendor=DB::table('vendor')
                    ->where('vendor_email', $vendor_email)
                    ->first();
                    
            $product = DB::table('product_varient')
                         ->where('product_varient.varient_id', $varient_id)
                         ->update(['stock'=>$st]);
            
            return redirect()->back()->withErrors('Stock Updated');
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function searchstock(Request $request)
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
  
  
                return view('vendor.stock.low_stock', compact("vendor_email", "vendor", "product"));
            } else {
                $product = DB::table('product_varient')
                         ->join('product', 'product_varient.product_id', '=', 'product.product_id')
                      ->orderBy('product_varient.stock', 'ASC')
                         ->paginate(10);
            
                return view('vendor.stock.low_stock', compact("vendor_email", "vendor", "product"));
            }
        } else {
            return redirect()->route('vendorlogin')->withErrors('please login first');
        }
    }
    public function getSearch($productname, $id)
    {
        if ($productname!=null && $id!=null) {
            $od = DB::table('product_varient')
       ->join('product', 'product_varient.product_id', '=', 'product.product_id')
        ->orderBy('product_varient.stock', 'ASC')
       ->where('product.vendor_id', $id)
       ->where([['product_name','=',$productname]])->paginate(10);
            return $od;
        }
    }
    public function assign_rider(Request $request)
    {
        $data=array(
            'delivery_boy_id'=>$request->delivery_boy_id,
        );
        
        $update=  DB::table('orders')->where('id', $request->order_id)
        ->update($data);
        if ($update) {
           $delivery_boy= DB::table('delivery_boy')->where('delivery_boy_id',$request->delivery_boy_id)->first();

           if(!empty($delivery_boy->fcm_token)){
            FCM_Notification(array($delivery_boy->fcm_token),'New Order Assigned','Please Check Your Order List');
           }
            $delivery_boy_name=$delivery_boy->delivery_boy_name;
            $delivery_boy_phone=$delivery_boy->delivery_boy_phone;
            
          $order_user=  DB::table('tbl_user')->where('id',$request->order_user_id)->first();
           if(!empty($order_user->fcm_token)){
             $msg= "Your Order is assigned To $delivery_boy_name Contact No# $delivery_boy_phone ";
                FCM_Notification(array($order_user->fcm_token), 'Order Assigned', $msg);
           }
            return response()->json(['status' => 'success', 'msg' => 'Rider Assign  Successfully']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Opps!! Someting Wrong']);
        }
    }
    
}
