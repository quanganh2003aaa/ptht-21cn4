<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Revenue;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(4);
        return view('orders.order', compact('orders'));
    }

    public function create()
    {
        $carts = Auth::user()->cart;
        $carts = json_decode($carts);
        $products = Product::where('quantityProduct', '!=', 0)->OrderBy('created_at', 'DESC')->paginate(9);
        return view('orders.create', compact('products', 'carts'));
    }

    public function deleteCart(Request $request) {
        $i = $request->input('product_id');
        $carts = Auth::user()->cart;
        $carts = json_decode($carts);
        for ($j=$i; $j < count($carts) - 1; $j++) {
            $carts[$j] = $carts[$j+1];
        }
        unset($carts[count($carts)-1]);
        $addCart['cart']= $carts;
        $cart = $carts;
        Auth::user()->update($addCart);
        $view = view('orders.test', compact('cart'))->render();
        return $view;
    }

    public function checkOut()
    {
        $carts = Auth::user()->cart;
        $carts = json_decode($carts);
        if ($carts == NULL) {
            return redirect()->back()->with('error','Hãy chọn sản phẩm!');
        }

        $orders = [];
        for ($i=0; $i < count($carts); $i++) {
            $product['id'] = $carts[$i];
            $test = $carts[$i];
            $product['sol'] = count(array_filter($carts, function($v) use ($test) {
                return $v == $test;
            }));
            array_push($orders, $product);
        }
        $orders = collect($orders)->unique();

        $sumPrice = 0;
        $allOrders = [];
        foreach ($orders as $order) {
            $data = Product::where('idProduct','=',$order['id'])->first();
            $data['sol'] = $order['sol'];
            $sumPrice += $data['priceProduct'] * $order['sol'];
            array_push($allOrders, $data);
        }
        return view('orders.checkOut', compact('allOrders', 'sumPrice'));
    }

    public function complete(Request $request) {
        $order = $request->only('sumPrice');
        $order['created_at'] = now();
        $order['updated_at'] = now();
        $order['product'] = json_encode($request->product);
        $client['cart'] = null;

        $products = $request->input('product');
        foreach ($products as $product) {
            $data = Product::where('idProduct','=',$product['idProduct'])->first();
            $sol = $data->quantityProduct - $product['sol'];
            if ($sol<0) {
                $test['quantityProduct'] = 0;
            }
            else {
                $test['quantityProduct'] = $sol;
            }
            $data->update($test);
        }

        $time = Carbon::now()->month . Carbon::now()->year;
        $revenue = Revenue::where('month', $time)->first();
        $testRevenue['revenue'] = $revenue['revenue'];
        $testRevenue['revenue'] += $order['sumPrice'];
        $revenue->update($testRevenue);

        if (Order::create($order) && Auth::user()->update($client)) {
            return redirect()->route('orders.create')->with('success','Đặt hàng thành công');
        }
        return redirect()->route('orders.create')->with('error','Đặt hàng thất bại');
    }

    public function search(Request $request){
        $search = $request['search'];
        $products = Product::where([['nameProduct','LIKE', "%{$search}%"],['quantityProduct', '!=', 0]])->OrderBy('created_at', 'DESC')->paginate(9);
        $view = view('orders.indexSearch', compact('products'))->render();
        return $view;
    }
}
