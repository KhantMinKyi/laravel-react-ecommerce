<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderList(){
        $orders = ProductOrder::with('product','user');
        if($status = request()->status){
            $orders->where('status',$status);
        }
        $orders = $orders->orderBy('status','ASC')->paginate(10);
        return view('admin.order.index',compact('orders'));
    }
    // Detail Order
    public function orderDetail($id){
        $order_id = $id;
        $order =ProductOrder::where('id',$order_id)->with('product','user')->first();

        return view('admin.order.detail',compact('order'));
    }
    // Update Order Status
    public function orderUpdate(Request $request){
        $order_id=$request->id;
        $status = $request->status;
        $order = ProductOrder::where('id',$order_id)->first();

        $order->update([
            'status'=>$status
        ]);
        if($status == 'success'){
            $product = Product::Where('id',$order->product_id)->first();
            $total = $order->total_quantity * $product->sale_price;
            $date = $order->created_at->format('Y-m-d');
            Income::create([
                'title'=> $product->name . " Sold ",
                'amount'=>$total,
                'date'=>$date,
                'description'=>'Sold With Website Order'
            ]);
            Product::where('id',$order->product_id)->update([
                'total_quantity'=>DB::raw('total_quantity-'.$order->total_quantity)
            ]);
        }
        return redirect()->back()->with("success","Product Update Successfully");
    }
}
