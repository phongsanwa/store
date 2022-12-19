<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Category;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        $paginator = Attribute::latest()->paginate(10);
        return view('back-end.attributes.index',compact('attributes','paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('back-end.attributes.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Attribute::create([
            'code' => $request->code,
            'name' => $request->name,
            'frontend_type' => $request->frontend_type,
            'is_filterable' => $request->has('is_filterable'),
            'is_required'   => $request->has('is_required'),
        ]);
        $data->categories()->attach($request->categories);
        return redirect()->route('attributes.index')->with('success','Thêm thuộc tính thành công.');
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
        $attribute = Attribute::find($id);
        $categories = Category::all();
        return view('back-end.attributes.edit',compact('attribute','categories'));
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
        $attribute = Attribute::find($id);
        $attribute['code'] = $request->code;
        $attribute['name'] = $request->name;
        $attribute['frontend_type'] = $request->frontend_type;
        $attribute['is_filterable'] = $request->has('is_filterable');
        $attribute['is_required']   = $request->has('is_required');
        $attribute->categories()->sync($request->categories);
        $attribute->save();
        return redirect()->route('attributes.index')->with('success','Sửa thuộc tính thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::find($id);
        $attribute->categories()->detach();
//        $attribute->categories()->delete();
        $attribute->delete();
        return redirect()->route('attributes.index')->with('success','Bạn đã xóa sản phẩm thành công !');
    }
}
