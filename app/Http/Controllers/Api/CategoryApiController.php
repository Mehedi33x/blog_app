<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryApiController extends Controller
{
    public function allCategory()
    {
        $allCategory = Category::all();
        if ($allCategory) {
            return $this->responseWithSuccess($allCategory, "all-Category");
        } else {
            return $this->responseWithError('No Category Found');
        }
    }
    public function singleCategory($id)
    {
        $singleCategory = Category::find($id);
        if ($singleCategory) {
            return $this->responseWithSuccess($singleCategory, "single-Category");
        } else {
            return $this->responseWithError('No Category Found');
        }
    }
    public function createCategory(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'required',
            ]
        );
        if ($validate->fails()) {
            return $this->responesewithError($validate->getMessageBag());
        }
        $category_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $category_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/category', $category_image);
            $category = Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'active',
                'image' => $category_image,
            ]);
            return $this->responesewithSuccess($category, 'Category created successfully');
        }
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        // dd($category);
        if ($category) {
            $category->delete();
            return $this->responesewithSuccess($category, 'Data deleted successfully');
        } else
            return $this->responesewithError('No data found');
    }
}
