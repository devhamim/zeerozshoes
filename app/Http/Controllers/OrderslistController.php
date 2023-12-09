<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courier;
use App\Models\city;
use App\Models\courierzone;
use App\Models\Product;
use App\Models\Billingdetails;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\customers;
use Carbon\Carbon;
use Str;

class OrderslistController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //orders_list
    function orders_list(){
        // $order_id = Order::all();
        $order_id = Order::with('rel_to_billing')->orderBy('created_at', 'desc')->get();
        $total_orders = Order::count();
        $total_processing = Order::where('status', 1)->count();
        $total_pending = Order::where('status', 3)->count();
        $total_hold = Order::where('status', 0)->count();
        $total_completed = Order::where('status', 2)->count();
        $total_cancel = Order::where('status', 4)->count();
        $total_ondelevary = Order::where('status', 5)->count();
        $total_pendinginvoice = Order::where('status', 6)->count();
        $couriers = courier::all();
        return view('backend.orders.orders_list', [
            'order_id'=>$order_id,
            'total_orders'=>$total_orders,
            'total_processing'=>$total_processing,
            'total_pending'=>$total_pending,
            'total_hold'=>$total_hold,
            'total_completed'=>$total_completed,
            'total_cancel'=>$total_cancel,
            'couriers'=>$couriers,
            'total_ondelevary'=>$total_ondelevary,
            'total_pendinginvoice'=>$total_pendinginvoice,
        ]);
    } 
    
    //orders_list_status
    function orders_list_status($status){
        // $order_id = Order::all();
        $order_id = Order::with('rel_to_billing')->orderBy('created_at', 'desc')->get();
        $order_status = Order::where('status', $status)->get();
        $total_orders = Order::count();
        $total_processing = Order::where('status', 1)->count();
        $total_pending = Order::where('status', 3)->count();
        $total_hold = Order::where('status', 0)->count();
        $total_completed = Order::where('status', 2)->count();
        $total_cancel = Order::where('status', 4)->count();
        $total_ondelevary = Order::where('status', 5)->count();
        $total_pendinginvoice = Order::where('status', 6)->count();
        $couriers = courier::all();
        return view('backend.orders.orders_list_status', [
            'order_id'=>$order_id,
            'total_orders'=>$total_orders,
            'total_processing'=>$total_processing,
            'total_pending'=>$total_pending,
            'total_hold'=>$total_hold,
            'total_completed'=>$total_completed,
            'total_cancel'=>$total_cancel,
            'couriers'=>$couriers,
            'total_ondelevary'=>$total_ondelevary,
            'total_pendinginvoice'=>$total_pendinginvoice,
            'order_status'=>$order_status,
        ]);
    }


    // orders.courier.list
    function orders_courier_list(Request $request){
        // $order_id = Order::all();
        $order_id = Order::where('courier_id', $request->courier_id)->with('rel_to_billing')->orderBy('created_at', 'desc')->get();
        // $billingdetails = Billingdetails::where('order_id', $order_id->first()->order_id)->get();
        // $OrderProducts = OrderProduct::where('order_id', $order_id->first()->order_id)->get();
        $total_orders = Order::count();
        $total_processing = Order::where('status', 1)->count();
        $total_pending = Order::where('status', 3)->count();
        $total_hold = Order::where('status', 0)->count();
        $total_completed = Order::where('status', 2)->count();
        $total_cancel = Order::where('status', 4)->count();
        $total_ondelevary = Order::where('status', 5)->count();
        $total_pendinginvoice = Order::where('status', 6)->count();
        $couriers = courier::all();
        return view('backend.orders.orders_couriers_list', [
            'order_id'=>$order_id,
            // 'billingdetails'=>$billingdetails,
            // 'OrderProducts'=>$OrderProducts,
            'total_orders'=>$total_orders,
            'total_processing'=>$total_processing,
            'total_pending'=>$total_pending,
            'total_hold'=>$total_hold,
            'total_completed'=>$total_completed,
            'total_cancel'=>$total_cancel,
            'couriers'=>$couriers,
            'total_ondelevary'=>$total_ondelevary,
            'total_pendinginvoice'=>$total_pendinginvoice,
        ]);
    }
    //orders_add
    function orders_add(){
        $order_id = Order::all();
        $couriers = courier::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('backend.orders.orders_add', [
            'couriers'=>$couriers,
            'products'=>$products,
            'order_id'=>$order_id,
        ]);
    }

    // orders_store
function orders_store(Request $request){
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
        ]);
    $order_id = Str::random(3).'-'.rand(1000,9999);
    // Create an order
    $order = Order::create([
        'order_id' => $order_id,
        'order_date' => $request->order_date,
        'invoice_id' => $request->invoice_id,
        'sub_total' => $request->sub_total,
        'shipping_cost' => $request->shipping_cost,
        'discount' => $request->discount,
        'total' => $request->total,
        'courier_id' => $request->courier_id,
        'city_id' => $request->city_id,
        'courier_zone_id' => $request->courier_zone_id,
        'order_note' => $request->order_note,
        'created_at' => Carbon::now(),
    ]);

    // Create billing details
    Billingdetails::create([
        'order_id' => $order_id,
        'customer_name' => $request->input('customer_name'),
        'customer_phone' => $request->input('customer_phone'),
        'customer_address' => $request->input('customer_address'),
        'created_at' => Carbon::now(),
    ]);
    
    // Create billing details
    customers::create([
        'customer_name' => $request->input('customer_name'),
        'customer_phone' => $request->input('customer_phone'),
        'customer_address' => $request->input('customer_address'),
        'created_at' => Carbon::now(),
    ]);

    // Insert order products
    $productIds = $request->product_id;
    $prices = $request->price;

    foreach ($request->quantity as $key => $quantity) {
        OrderProduct::create([
            'order_id' => $order_id,
            'product_id' => $productIds[$key],
            'quantity' => $quantity,
            'price' => $prices[$key],
        ]);
    }
    return back()->withSuccess('Order add successfully');
}


    public function getCities(Request $request)
{
    $courierId = $request->input('id');
    if (!$courierId) {
        return response()->json(['error' => 'No courier ID provided.']);
    }

    $cities = City::where('status', 1)->where('courier_id', $courierId)->pluck('name', 'id');
    
    $charge = courier::where('id', $courierId)->value('charge');

    return response()->json(['cities' => $cities, 'charge' => $charge]);
}
    
    function getzone(Request $request){
        $zones = courierzone::where('status', 1)->where('city_id', $request->id)->pluck('zone', 'id');

        return response()->json($zones);
    }

    // getproduct
    public function getProduct(Request $request)
{
    $productId = $request->input('id');
    if (!$productId) {
        return response()->json(['error' => 'No product ID provided.']);
    }
    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['error' => 'Product not found.']);
    }
    $data = [
        'product_id' => $product->id,
        'sku' => $product->sku,
        'productName' => $product->product_name,
        'product_price' => $product->product_discount,
        'quantity' => $product->quantity,
        'sub_total' => $product->product_price*$product->quantity,
    ];

    return response()->json($data);
}
    // getProductupdate
    public function getProductupdate(Request $request)
{
    $productId = $request->input('id');
    if (!$productId) {
        return response()->json(['error' => 'No product ID provided.']);
    }
    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['error' => 'Product not found.']);
    }
    $data = [
        'product_id' => $product->id,
        'sku' => $product->sku,
        'productName' => $product->product_name,
        'product_price' => $product->product_discount,
        'sub_total' => $product->product_price*$product->quantity,
    ];

    return response()->json($data);
}



// orders_update
function orders_edit($order_id){
    $orders = Order::where('order_id',$order_id)->first();
    $orderproducts = OrderProduct::where('order_id',$order_id)->first();
    $orderproduct = OrderProduct::where('order_id',$order_id)->get();
    $billingdetails = Billingdetails::where('order_id',$order_id)->first();
    $couriers = courier::all();
    $products = Product::all();
    return view('backend.orders.orders_edit', [
        'orders' => $orders,
        'billingdetails' => $billingdetails,
        'orderproducts' => $orderproducts,
        'couriers' => $couriers,
        'products' => $products,
        'orderproduct' => $orderproduct,
    ]);
}

public function orders_update(Request $request)
{
    $request->validate([
        'customer_name' => 'required',
        'customer_phone' => 'required',
        'customer_address' => 'required',
    ]);

    // If you have an existing order_id, retrieve the order
    $order_id = $request->input('order_id') ?: Str::random(3) . '-' . rand(1000, 9999);
    $order = Order::where('order_id', $order_id)->first();

    if($request->courier_id == ''){
        Order::where('order_id',$order_id)->update([
            'order_date' => $request->order_date,
            'invoice_id' => $request->invoice_id,
            'sub_total' => $request->sub_total,
            'shipping_cost' => $request->shipping_cost,
            'discount' => $request->discount,
            'total' => $request->total,
            'order_note' => $request->order_note,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
    }
    elseif($request->city_id == ''){
        Order::where('order_id',$order_id)->update([
            'order_date' => $request->order_date,
            'invoice_id' => $request->invoice_id,
            'sub_total' => $request->sub_total,
            'shipping_cost' => $request->shipping_cost,
            'discount' => $request->discount,
            'total' => $request->total,
            'courier_id' => $request->courier_id,
            'order_note' => $request->order_note,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
    }
    else{
        Order::where('order_id',$order_id)->update([
            'order_date' => $request->order_date,
            'invoice_id' => $request->invoice_id,
            'sub_total' => $request->sub_total,
            'shipping_cost' => $request->shipping_cost,
            'discount' => $request->discount,
            'total' => $request->total,
            'courier_id' => $request->courier_id,
            'city_id' => $request->city_id,
            'courier_zone_id' => $request->courier_zone_id,
            'order_note' => $request->order_note,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
    }
    

    // Create or update billing details
    Billingdetails::where('order_id',$order_id)->update([
            'customer_name' => $request->input('customer_name'),
            'customer_phone' => $request->input('customer_phone'),
            'customer_address' => $request->input('customer_address'),
            'updated_at' => Carbon::now(),
        ]
    );
    if (!empty($request->product_id)) {
        foreach ($request->product_id as $key => $productId) {
            OrderProduct::updateOrCreate(
                [
                    'order_id' => $order_id,
                    'product_id' => $productId,
                ],
                [
                    'quantity' => $request->quantity[$key],
                    'price' => $request->price[$key],
                    'updated_at' => now(),
                ]
            );
        }
    }

    return redirect()->route('orders.list')->withSuccess('Order updated successfully');
}

function orders_delete($id){

    Order::find($id)->delete();
    return back()->withError('Order Delete Successfully');
}

function orders_product_delete($id){
    OrderProduct::find($id)->delete();
    return back()->withError('Order Delete Successfully');
}

function orders_exportOrdersReport(){

    $rules = [
        'start_date' => '',
        'end_date' => '',
    ];

    $validatedData = $request->validate($rules);

    $sDate = $validatedData['start_date'];
    $eDate = $validatedData['end_date'];


    $purchases = DB::table('billingdetails')
            ->join('products', 'purchase_details.product_id', '=', 'products.id')
            ->join('purchases', 'purchase_details.purchase_id', '=', 'purchases.id')
            ->whereBetween('purchases.purchase_date',[$sDate,$eDate])
            ->where('purchases.purchase_status','1')
            ->select( 'purchases.purchase_no', 'purchases.purchase_date', 'purchases.supplier_id','products.product_code', 'products.product_name', 'purchase_details.quantity', 'purchase_details.unitcost', 'purchase_details.total')
            ->get();


        $purchase_array [] = array(
            'Date',
            'No Purchase',
            'Supplier',
            'Product Code',
            'Product',
            'Quantity',
            'Unitcost',
            'Total',
        );

        foreach($purchases as $purchase)
        {
            $purchase_array[] = array(
                'Date' => $purchase->purchase_date,
                'No Purchase' => $purchase->purchase_no,
                'Supplier' => $purchase->supplier_id,
                'Product Code' => $purchase->product_code,
                'Product' => $purchase->product_name,
                'Quantity' => $purchase->quantity,
                'Unitcost' => $purchase->unitcost,
                'Total' => $purchase->total,
            );
        }

        $this->exportExcel($purchase_array);
}

}
