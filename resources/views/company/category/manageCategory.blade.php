@extends('company.master')

@section('mainContent')
    <h1>Manage Category</h1>
    <hr>
        {{Session::get('msg')}}
    <hr>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>SI</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
            $i=0;
        ?>
        @foreach($categories as $category)
            <tr>
                <td>{{ ++$i  }}</td>
                <td>{{ $category->categoryName  }}</td>
                <td>{{ $category->categoryDescription  }}</td>
                <td>{{ $category->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                <td><a href="{{ url('company/edit-category/'.$category->id) }}">Edit</a> | <a href="{{ url('company/delete-category/'.$category->id) }}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection