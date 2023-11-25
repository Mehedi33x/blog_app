<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function list()
    {

        $categories = Category::paginate(5);
        // dd($categories);
        return view('backend.pages.category.list', compact('categories'));
    }
    public function create()
    {

        return view('backend.pages.category.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        // dd($request->all());
        $category_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $category_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/category', $category_image);
        }
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active',
            'image' => $category_image,
        ]);
        return to_route('category.list');
    }

    public function edit($id)
    {
        $cat = Category::find($id);
        return view('backend.pages.category.edit', compact('cat'));
    }
    public function update(Request $request, $id)
    {
        $cat = Category::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $cat_image = $request->image;
        if ($image = $request->file('image')) {
            if ($image = $request->file('image')) {
                if (file_exists(public_path('uploads/category/' . $cat_image))) {
                    File::delete(public_path('uploads/category/' . $cat_image));
                }
                $cat_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/category/', $cat_image);
            }
        }
        $cat->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active',
            'image' => $cat_image,
        ]);
        toastr()->success('Category updated successfully');
        return redirect()->route('category.list');
    }


    public function delete($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        toastr()->success('Category deleted successfully');
        return redirect()->back();
    }
}
