<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCate()
    {
        return view('backend.pages.categories.addcategory');
    }
    public function storeCate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        session()->flash('message', 'Category created successfully!');
        return redirect('admin/managecategory');
    }
    public function manageCate()
    {
        $categories = Category::all();
        return view('backend.pages.categories.managecategory', compact('categories'));
    }
    public function deleteCate($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/managecategory');
    }
    public function editCate($id)
    {
        $category = Category::find($id);
        return view('backend.pages.categories.editcategory', compact('category'));
    }
    public function updateCate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->update();
        session()->flash('message', 'Category updated successfully!');
        return redirect('admin/managecategory');
    }
    public function statusCate($id)
    {
        $category = Category::find($id);
        if ($category->status == 1) {
            $category->status = 0;
        } else {
            $category->status = 1;
        }
        $category->update();
        return redirect('admin/managecategory');
    }
    
}
