@extends('back-end.layouts.master')
@section('title', 'Thêm sản phẩm')
@section('styles')
    <link href="{{asset('store_backend/css/select2.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('store_backend/css/dropzone.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-content category-create">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('home/dashboard') }}"><i class="fa fa-home-alt mr-2"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('store/category/index') }}">Danh mục sản phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12 col-lg-9 create-wrapper">

                    <div class="row">
                        <form action="{{ route('product_attributes.store') }}" method="POST" class="form-add-custom mt-3" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-general-input col-12 p-5">
                                @csrf
                                <div class="mb-3">
                                    <label class="control-label" for="name">Tên:<span class="text-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Nhập tên thuộc tính"
                                        id="value"
                                        name="value"
                                        value="{{ old('value') }}"
                                    />
                                    @if ($errors->has('value'))
                                        <span class="text-danger text-left">{{ $errors->first('value') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="control-label" for="name">Quantity</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Enter số lượng thuộc tính"
                                        id="quantity"
                                        name="quantity"
                                        value="{{ old('quantity') }}"
                                    />
                                    @if ($errors->has('quantity'))
                                        <span class="text-danger text-left">{{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="control-label" for="name">Giá thuộc tính</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Nhập giá thuộc tính"
                                        id="price"
                                        name="price"
                                        value="{{ old('price') }}"
                                    />
                                    @if ($errors->has('price'))
                                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="control-label" for="attribute_name">Category Variant Name</label>
                                        <select name="attribute_name" id="attribute_name" class="form-control">
                                            @foreach($attribute as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="control-label" for="product_name">Category Variant Name</label>
                                        <select name="product_name" id="product_name" class="form-control">
                                            @foreach($product as $label)
                                                <option value="{{ $label->id }}">{{ $label->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="{{ route('product_attributes.index') }}" class="btn btn-default">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@stop
