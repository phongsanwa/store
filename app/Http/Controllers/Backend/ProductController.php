<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
//        dd($product);
        return view('back-end.product.index',['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = Category::all();
        $product_child = Product::all();
        return view('back-end.product.create',['categories'=>$categories,'product_child'=>$product_child]);
    }
    public function uploadImage(Request $request) {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('public/content'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/content/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        $product_child = Product::with('subProduct')->get();
        return view('back-end.product.edit',['product'=>$product,'categories'=>$categories,'product_child'=>$product_child]);
    }

    public function update(Request $request,$id){
        $data = Product::findOrFail($id);
        $data->category_id = $request->txtCategory;
        $data->product_name = $request->product_name;
        $data->sku = $request->sku;
        $data->content = $request->editor1;
        $data->price = $request->price;
        $data->cover_price = $request->cover_price;
        $data->parent_id = $request->parent_id;
        $data->save();
        return redirect()->route('products.index')->with('success','Sửa sản phẩm thành công');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'sku' => 'required',
        ]);
        //process image
        $data= new Product();
        if($request->file('thumbnail')) {
            $file= $request->file('thumbnail');
            $filename= $file->getClientOriginalName();
            $file->storeAs('public/images',$filename);
            $data['images']= $filename;
        }
        $data->category_id = $request->txtCategory;
        $data->product_name = $request->product_name;
        $data->sku = $request->sku;
        $data->content = $request->editor1;
        $data->price = $request->price;
        $data->cover_price = $request->cover_price;
        $data->parent_id = $request->parent_id;
        $data->save();
        return redirect()->route('products.index')
            ->with('success','Tạo sản phẩm thành công.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product);
        foreach ($product as $p){
            Storage::delete(("public\images"). DIRECTORY_SEPARATOR .$p->images);
            $html = $p->content;
            preg_match_all('/<img\s.*?\bsrc="(.*?)".*?>/si', $html, $matches);
            $image = $matches[1];
            if (isset($image[0])){
                File::delete(("public\content"). DIRECTORY_SEPARATOR . pathinfo($image[0],PATHINFO_BASENAME));
            }
            if (isset($image[1])){
                File::delete(("public\content"). DIRECTORY_SEPARATOR . pathinfo($image[1],PATHINFO_BASENAME));
            }
            if (isset($image[2])){
                File::delete(("public\content"). DIRECTORY_SEPARATOR . pathinfo($image[2],PATHINFO_BASENAME));
            }
            if (isset($image[3])){
                File::delete(("public\content"). DIRECTORY_SEPARATOR . pathinfo($image[3],PATHINFO_BASENAME));
            }
            $p->delete();
        }
        return redirect()->route('products.index')
            ->with('success','Bạn xóa sản phẩm thành công');
    }

}
