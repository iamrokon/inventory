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
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection