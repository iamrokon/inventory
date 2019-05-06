@extends('admin_view.master')

@section('mainContent')
    <h1>View Product Details</h1>
    <hr>
    <img src="{{ asset($product->productPicture)  }}" width="300">
    <table>
        <tr>
            <td>Product Name</td><td>:</td><td>{{ $product->productName }}</td>
        </tr>
        <tr>
            <td>Category Name</td><td>:</td><td>{{ $product->categoryName }}</td>
        </tr>
        <tr>
            <td>Price</td><td>:</td><td>{{ $product->productPrice }}</td>
        </tr>
        <tr>
            <td>Quantity</td><td>:</td><td>{{ $product->productQuantity }}</td>
        </tr>
        <tr>
            <td>Description</td><td>:</td><td>{{ $product->productDescription }}</td>
        </tr>
        <tr>
            <td>Publication Status</td><td>:</td><td>{{ $product->publicationStatus == 1 ? 'Published': 'Unpublished'}}</td>
        </tr>
    </table>
    <a href="{{ url('/manage-product') }}">Back to Manage Product</a>
@endsection