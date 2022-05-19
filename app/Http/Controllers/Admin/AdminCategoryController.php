<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('admin.category.index.title');
        $viewData["categories"] = Category::all();
        return view('admin.category.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Category::validate($request);

        $newCategory = new Category();
        $newCategory->setName($request->input('name'));
        $newCategory->setDescription($request->input('description'));
        $newCategory->save();

        return back();
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = __('admin.category.edit.title');
        $viewData["category"] = Category::findOrFail($id);
        return view('admin.category.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Category::validate($request);

        $category = Category::findOrFail($id);
        $category->setName($request->input('name'));
        $category->setDescription($request->input('description'));

        $category->save();
        return redirect()->route('admin.category.index');
    }
}
