<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProductAttribute::all();
//        dd($data);
        return view('back-end.product_attributes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProductAttribute::all();
        $attribute = Attribute::all();
        $product = Product::all();
        return view('back-end.product_attributes.create',compact('data','attribute','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ProductAttribute();
        $data->value = $request->get('value');
        $data->quantity = $request->get('quantity');
        $data->price = $request->get('price');
        $data->attribute_id = $request->get('attribute_name');
        $data->product_id = $request->get('product_name');
        $data->save();
        return redirect()->route('product_attributes.index')->with('success','Bạn đã thêm tên thuộc tính thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
