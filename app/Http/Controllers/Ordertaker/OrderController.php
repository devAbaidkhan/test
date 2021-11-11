<?php

namespace App\Http\Controllers\Ordertaker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function today_order_restaurant(Request $request)
    {
        if (!Session::has('ordertaker')) {
            return redirect()->route('ordertaker.login')->withErrors('please login first');
        }
        return view('ordertaker.order.order');
    }
    public function today_order_restaurant_list(Request $request)
    {
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
            ->where('vendor_id', Session::get('ordertaker')->vendor_id)
            ->leftJoin('order_status', 'orders.order_status', '=', 'order_status.id')
            ->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
    
        if (empty($request->input('search.value'))) {
            $results = DB::table('orders')
                ->where('vendor_id', Session::get('ordertaker')->vendor_id)
                ->leftJoin('order_status', 'orders.order_status', '=', 'order_status.id')
                ->select('orders.id', 'orders.cart_no', 'orders.total_product_price', 'orders.delivery_charges', 'orders.net_amount', 'orders.created_at', 'orders.updated_at', 'orders.currency', 'order_status.name AS order_status', 'orders.order_type')
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order, $dir)
                            ->get();
        } else {
            $search = $request->input('search.value');
    
            $results =  DB::table('orders')
                ->where('vendor_id', Session::get('ordertaker')->vendor_id)
                ->leftJoin('order_status', 'orders.order_status', '=', 'order_status.id')
                ->select('orders.id', 'orders.cart_no', 'orders.total_product_price', 'orders.delivery_charges', 'orders.net_amount', 'orders.created_at', 'orders.updated_at', 'orders.currency', 'order_status.name AS order_status', 'orders.order_type')
                ->where('cart_no', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
    
            $totalFiltered = DB::table('orders')
                ->where('vendor_id', Session::get('ordertaker')->vendor_id)
                ->leftJoin('order_status', 'orders.order_status', '=', 'order_status.id')
                ->select('orders.id', 'orders.cart_no', 'orders.total_product_price', 'orders.delivery_charges', 'orders.net_amount', 'orders.created_at', 'orders.updated_at', 'orders.currency', 'order_status.name AS order_status', 'orders.order_type')
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
                $nestedData['created_at'] = date("d-M-Y h:i:s a", strtotime($row->created_at)) ;
                $ordrid=$row->id;
                $link=route("ordertaker.order.detail", ["ordrid"=>$ordrid]);
    
                $csrf=csrf_token();
                $nestedData['options'] = "
			<a href='$link' title='Edit' class='edit_data mr-2' style='font-size: 18px'><i class='fa fa-edit'></i></a>
			";
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
        if (!Session::has('ordertaker')) {
            return redirect()->route('ordertaker.login')->withErrors('please login first');
        }
        
        $vendor_id = Session::get('ordertaker')->vendor_id;

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
        ->select(
            'order_details.id AS order_details_id',
            'order_details.product_id',
            'order_details.variant_id',
            'order_details.unit AS order_details_unit',
            'order_details.order_description',
            'order_details.price AS order_details_price',
            'order_details.product_quantity',
            'order_details.total_price',
            'order_details.created_at',
            'resturant_product.product_name',
            'resturant_product.product_image',
            'resturant_variant.quantity AS resturant_variant_quantity',
            'resturant_variant.unit AS resturant_variant_unit',
            'resturant_variant.price AS resturant_variant_price',
            'order_details.addon_price',
        )
        ->get();
        $total_orders= DB::table('orders')
        ->where('user_id', $order->user_id)
        ->count();
        $pending_orders= DB::table('orders')
        ->where('user_id', $order->user_id)
        ->where('order_status', 1)
        ->count();
        $completed_orders= DB::table('orders')
        ->where('user_id', $order->user_id)
        ->where('order_status', 3)
        ->count();
        $canceled_orders= DB::table('orders')
        ->where('user_id', $order->user_id)
        ->where('order_status', 3)
        ->count();
        $disputed_orders= DB::table('orders')
        ->where('user_id', $order->user_id)
        ->where('order_status', 5)
        ->count();
        $order_status=DB::table('order_status')->get();
        $delivery_boys=DB::table('delivery_boy')->where('vendor_id', $vendor_id)->get();

        return view('ordertaker.order.order_details', compact('order', 'order_details', 'order_status', 'delivery_boys', 'completed_orders', 'disputed_orders', 'total_orders', 'pending_orders', 'canceled_orders'));
    }
    public function change_order_restaurant_status(Request $request)
    {
        $order_type=$request->order_type;
        $order_confirmed=$request->order_confirmed;
        $data=array(
            'order_status'=>$request->order_status,
        );
        
        if ($request->order_status==4) {
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
    public function assign_rider(Request $request)
    {
        $data=array(
            'delivery_boy_id'=>$request->delivery_boy_id,
        );
        
        $update=  DB::table('orders')->where('id', $request->order_id)
        ->update($data);
        
        if ($update) {
            
        $delivery_boy= DB::table('delivery_boy')->where('delivery_boy_id',$request->delivery_boy_id)->first();
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
