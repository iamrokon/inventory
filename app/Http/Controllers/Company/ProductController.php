<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Category;
use DB;

class ProductController extends Controller
{
    public function addProduct()
    {
        return view('company.product.addProduct');
    }

    public function storeProduct(Request $request)
    {
        $this->validate($request,[
            'productName' => 'required',
            'productCategory' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productDescription' => 'required',
            'publicationStatus' => 'required',
        ]);

        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->productCategory;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productDescription = $request->productDescription;
        $product->productPicture = 'picture';
        $product->publicationStatus = $request->publicationStatus;
        $product->save();

        $lastId = $product->id;

        $productPic = $request->file('productPicture');
        $name = $lastId.$productPic->getClientOriginalName();
        $uploadPath = 'public/uploadPic/';
        $productPic->move($uploadPath,$name);
        $imageUrl = $uploadPath.$name;

        $updateImage = Product::find($lastId);
        $updateImage->productPicture = $imageUrl;
        $updateImage->save();

        return redirect('company/add-product')->with('msg','Product save in database successfully');
    }

//    public function storeProduct(Request $request)
//    {
//        $this->validate($request,[
//            'productName' => 'required',
//            'productCategory' => 'required',
//            'productPrice' => 'required',
//            'productQuantity' => 'required',
//            'productDescription' => 'required',
//            'publicationStatus' => 'required',
//        ]);
//
//        $productPic = $request->file('productPicture');
//        $name = $productPic->getClientOriginalName();
//        $uploadPath = 'public/uploadPic/';
//        $productPic->move($uploadPath,$name);
//        $imageUrl = $uploadPath.$name;
//
//        $this->saveProductInfo($request,$imageUrl);
//        return redirect('company/add-product')->with('msg','Product save in database successfully');
//    }
//    protected function saveProductInfo($request,$imageUrl){
//        $product = new Product();
//        $product->productName = $request->productName;
//        $product->categoryId = $request->productCategory;
//        $product->productPrice = $request->productPrice;
//        $product->productQuantity = $request->productQuantity;
//        $product->productDescription = $request->productDescription;
//        $product->productPicture = $imageUrl;
//        $product->publicationStatus = $request->publicationStatus;
//        $product->save();
//    }

    public function manageProduct()
    {
        $products = DB::table('products')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->select('products.*', 'categories.categoryName')
            ->get();

        return view('company.product.manageProduct',['products'=>$products]);
    }
    public function orderProduct($id){
        $order = new Order();
        $order->productId = $id;
        $order->save();


        return redirect('company/manage-product')->with('msg','Product ordered successfully');
    }
    public function editProduct($id){
        $productById = Product::where('id',$id)->first();

        return view('company.product.editProduct',[
            'product'=>$productById,
        ]);
    }

    public function updateProduct(Request $request)
    {

        $this->validate($request,[
            'productName' => 'required',
            'productCategory' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        $product = Product::find($request->productId);

        $productImage = $request->file('productPicture');

        if($productImage){
            if($product->productPicture)
                unlink($product->productPicture);
            $name = $request->productId.$productImage->getClientOriginalName();
            $uploadPath = 'public/uploadPic/';
            $productImage->move($uploadPath,$name);
            $imageUrl = $uploadPath.$name;
        }
        else{
            $imageUrl = $product->productPicture;
        }

        $product->productName = $request->productName;
        $product->categoryId = $request->productCategory;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productDescription = $request->productDescription;
        $product->productPicture = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();

        return redirect('company/manage-product')->with('msg','Product updated successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        unlink($product->productPicture);
        $product->delete();

        return redirect('company/manage-product')->with('msg','Product deleted successfully');
    }

    public function receivedProduct()
    {
        $products = DB::table('products')
            ->join('orders', 'orders.productId', '=', 'products.id')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->where('orders.receiveStatus', '=', 1)
            ->select('products.*', 'categories.categoryName')
            ->get();

        return view('company.product.receivedProduct',['products'=>$products]);
    }
}
