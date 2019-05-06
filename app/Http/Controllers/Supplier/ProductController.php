<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Category;
use DB;

class ProductController extends Controller
{
    public function orderedProduct(){
        $products = DB::table('products')
            ->join('orders', 'orders.productId', '=', 'products.id')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->where('orders.receiveStatus', '=', 0)
            ->select('products.productName','products.productPicture', 'categories.categoryName', 'orders.id')
            ->get();

        return view('supplier.product.orderedProduct',['products'=>$products]);
    }
    public function sendProduct($order_id){
        $sendproductById = Order::where('id',$order_id)->first();
        $sendproductById->receiveStatus = 1;
        $sendproductById->save();


        return redirect('supplier/ordered-product')->with('msg','Product send successfully');
    }
}
