@extends('company.master')

@section('mainContent')
    <h1>Update Product</h1>
    <hr>
    {{Session::get('msg')}}
    <hr>
    <form action="{{url('company/update-product')}}" enctype="multipart/form-data" class="form-horizontal" name="editForm" method="POST">
        @csrf
    <div class="form-group">
        <label class="control-label col-sm-2" for="productName">Product Name:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="productName" value="{{$product->productName}}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="productCategory">Product Category:</label>
        <div class="col-sm-4">
            <select class="form-control" id="productCategory" name="productCategory">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="productPrice">Product Price:</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="productPrice" name="productPrice" value="{{$product->productPrice}}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="productQuantity">Product Quantity:</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="productQuantity" name="productQuantity" value="{{$product->productQuantity}}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="productDescription">Product Description:</label>
        <div class="col-sm-6">
            <textarea rows="4" class="form-control" id="productDescription" name="productDescription" required>{{$product->productDescription}}</textarea>
        </div>
    </div>
    <input type="hidden" name="productId" value="{{ $product->id }}">
    <div class="form-group">
        <label class="control-label col-sm-2" for="productPicture">Product Picture:</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" id="productPicture" name="productPicture">
            <img src="{{asset($product->productPicture)}}" width="100">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="publicationStatus">Publication Status:</label>
        <div class="col-sm-4">
            <select class="form-control" id="publicationStatus" name="publicationStatus">
                <option>Select publication status</option>
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    </form>
    <script>
        document.forms['editForm'].elements['productCategory'].value={{$product->categoryId}}
        document.forms['editForm'].elements['publicationStatus'].value={{$product->publicationStatus}}
    </script>
    @include('company.error.errors');
@endsection