@extends('back-end.layouts.master')
@section('title', 'Thêm thuộc tính')
@section('styles')
    <link href="{{asset('store_backend/css/select2.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('store_backend/css/dropzone.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Thêm sản phẩm</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row" data-select2-id="13">
                <div class="col-12" data-select2-id="12">
                    <form action="{{ route('attributes.update', $attribute->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card" data-select2-id="11">
                            <div class="card-header">
                                <h4 class="card-title">Thông tin cơ bản</h4>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body" data-select2-id="10">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="code">Mã thuộc tính: <span class="text-danger">*</span></label>
                                            <input id="code" name="code" value="{{ $attribute->code }}" type="text" class="form-control" placeholder="Vd: color, size,...">
                                            @error('code')
                                            <div class="alert alert-danger">{{ $errors->first('code') }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="manufacturername">Tên </label>
                                            <input id="name" name="name" value="{{ $attribute->name }}" type="text" class="form-control">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="control-label" for="frontend_type">Frontend Type</label>
                                                @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                                <select name="frontend_type" id="frontend_type" class="form-control">
                                                    @foreach($types as $key => $label)
                                                        <option value="{{ $key }}"
                                                        {{ $attribute->frontend_type == $key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 right-create" data-select2-id="8">
                                        <div class="mb-3">
                                            <label class="control-label">Danh mục <span class="text-danger">*</span></label>
                                            <select id="categories" name="categories[]" multiple="multiple" class="form-control form-select categories custom-select bg-white border-left-0 border-md">
                                                <option>Chọn danh mục</option>
                                                @foreach($categories as $c)
                                                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                                                    @if($c->subcategory)
                                                        @foreach($c->subcategory as $sub)
                                                            <option value="{{$sub->id}}">--{{$sub->category_name}}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" id="is_filterable" name="is_filterable"/>Filterable
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" id="is_required" name="is_required"/>Required
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('store_backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/dropzone.min.js') }}"></script>

@php
    $category_ids = [];
@endphp
@foreach($attribute->categories as $cate)
    @php
        if(!empty($cate)){
            array_push($category_ids,$cate->id);
        }
    @endphp
@endforeach
<script>
    $(document).ready(function() {
        $('.custom-select').select2();
        data = [];
        data = <?php if (!empty($category_ids)) {
            echo json_encode($category_ids);
        } ?>;
        $('.categories').val(data).trigger('change');
    });
</script>
@endsection
