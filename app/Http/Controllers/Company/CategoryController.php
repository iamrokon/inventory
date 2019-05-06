<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function createCategory()
    {
        return view('company.category.createCategory');
    }
    public function storeCategory(Request $request)
    {
        //$rokon = $request->session()->get('rokon');

        $this->validate($request,[
            'categoryName' => 'required|min:3|max:12|unique:categories',
            'categoryDescription' => 'required',
        ]);

        // $categories = new Category();
        // $categories->categoryName = $request->categoryName;
        // $categories->categoryDescription = $request->categoryDescription;
        // $categories->publicationStatus = $request->publicationStatus;
        // $categories->save();
        //dd($categories->id);

        //Category::create($request->all());

        DB::table('categories')->insert([
            'categoryName' => $request->categoryName,
            'categoryDescription' => $request->categoryDescription,
            'publicationStatus' => $request->publicationStatus,
        ]);

        return redirect()->back()->with('msg','Category save in database successfully');
        //return redirect('/add-category')->with('msg','Category save in database successfully');
    }
    public function manageCategory()
    {
        //$categories = Category::all();

        return view('company.category.manageCategory');
    }
    public function editCategory($id)
    {
        //return $id;

        $categoryById = Category::where('id',$id)->first();

        return view('company.category.editCategory',['categoryById'=>$categoryById]);
    }
    public function updateCategory(Request $request)
    {
        $this->validate($request,[
            'categoryName' => 'required|min:2|max:18|unique:categories',
            'categoryDescription' => 'required',
        ]);
        $category = Category::find($request->categoryId);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();

        return redirect('company/manage-category')->with('msg','Category updated successfully');
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('company/manage-category')->with('msg','Category deleted successfully');
    }
}
