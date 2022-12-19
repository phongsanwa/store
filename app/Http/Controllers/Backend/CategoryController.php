<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with('subCategory')->where('parent_id',0)->get();
        $paginator = Category::paginate(10);
        return view('back-end.category.index',compact('categories','paginator'));
    }

    public function create(){
        $categories = Category::with('subCategory')->where('parent_id',0)->get();
        return view('back-end.category.create',compact('categories'));
    }

    public function store(Request $request){
        $data = new Category();
        if($request->file('thumbnail')) {
            $file= $request->file('thumbnail');
            $filename= $file->getClientOriginalName();
            $file->storeAs('public/category',$filename);
            $data['images']= $filename;
        }
        $data->category_name = $request->txtNameCategory;
        $data->parent_id = $request->txtCode;
        $data->order = $request->txtOrder;
        $data->save();
        return redirect()->route('categories.index')->with('success','Thêm danh mục thành công');
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->products()->delete();
        $category->delete();
        return redirect()->route('categories.index')->with('success','Bạn đã xóa sản phẩm thành công !');

    }
}
