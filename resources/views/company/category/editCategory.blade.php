@extends('company.master')

@section('mainContent')
    <h1>Add Category</h1>
    <hr>
    {{Session::get('msg')}}
    <hr>
    <form action="{{url('company/update-category')}}" name="editForm" class="form-horizontal" method="POST">
        @csrf
    <div class="form-group">
        <label class="control-label col-sm-2" for="categoryName">Category Name:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="categoryName" value={{ $categoryById->categoryName }} name="categoryName">
            <input type="hidden" class="form-control" id="categoryId" value={{ $categoryById->id }} name="categoryId">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="categoryDescription">Category Description:</label>
        <div class="col-sm-6">
            <textarea rows="4" class="form-control" id="categoryDescription" name="categoryDescription">{{ $categoryById->categoryDescription }}</textarea>
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
        document.forms['editForm'].elements['publicationStatus'].value={{ $categoryById->publicationStatus }}
    </script>

@endsection