@extends('company.master')

@section('mainContent')
    <h1>Manage Product</h1>
    <hr>
    {{Session::get('msg')}}
    <hr>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>SI</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Picture</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i=0;
        ?>
        @foreach($products as $product)
            <tr>
                <td>{{ ++$i  }}</td>
                <td>{{ $product->productName  }}</td>
                <td>{{ $product->categoryName  }}</td>
                <td><img src="{{asset($product->productPicture)}}" width="100"></td>
                <td>{{ $product->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                <td><a href="{{ url('company/order-product/'.$product->id) }}">Order</a> | <a href="{{ url('company/edit-product/'.$product->id) }}">Edit</a> | <a href="{{ url('company/delete-product/'.$product->id) }}" onclick="return confirm('Are you sure to delete ?')">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection