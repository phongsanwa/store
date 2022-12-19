@extends('back-end.layouts.master')
@section('title', 'Thêm sản phẩm')
@section('styles')
    <link href="{{asset('store_backend/css/select2.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('store_backend/css/dropzone.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
@endsection
@section('scripts')
    <script src="{{ asset('store_backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/dropzone.min.js') }}"></script>
<script>
    if($('#editor1').length){
        CKEDITOR.replace( 'editor1',{
            filebrowserUploadUrl: '{{ route('upload', ['_token' => csrf_token()]) }}',
            filebrowerUploadMethod: 'form'
        });
    }
    $(".js-example-placeholder-single").select2({
        placeholder: "Chọn Tên của sản phẩm cha",
        allowClear: true
    });
</script>
@endsection
@section('content')
<div class="page-content product-create">
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
                        <form action="/products" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                                <label for="productname">Tên sản phẩm <span class="text-danger">*</span></label>
                                                <input id="product-name" name="product_name" type="text" class="form-control">
                                                @error('product_name')
                                                <div class="alert alert-danger">{{ $errors->first('product_name') }}</div>
                                                @enderror
                                            </div>
                                            <label>Sản phẩm cha</label>
                                            <select class="form-select js-example-placeholder-single form-select-lg mb-3" id="parent_id" name="txtCode" aria-label="form-select-lg example">
                                                <option selected value="0">Chọn sản phẩm cha</option>
                                                @foreach($product_child as $c)
                                                    <option value="{{$c->id}}">{{$c->product_name}}</option>
                                                    @if($c->subcategory)
                                                        @foreach($c->subproduct as $sub)
                                                            <option value="{{$sub->id}}">--{{$sub->product_name}}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="mb-3">
                                                <label for="manufacturername">Mô tả ngắn </label>
                                                <input id="description" name="description" type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">SKU</label>
                                                <input id="sku" name="sku" type="text" class="form-control">
                                            </div>
                                            <div class="row d-flex">
                                                <div class="mb-3 col-md-6">
                                                    <label for="price">Giá vốn</label>
                                                    <input id="price" name="price" type="text" class="form-control price-change">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="cover_price">Giá bán</label>
                                                    <input id="cover_price" name="cover_price" type="text"  class="form-control price-change">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 right-create" data-select2-id="8">
                                            <div class="mb-3" data-select2-id="7">
                                                <label class="control-label">Danh mục <span class="text-danger">*</span></label>
                                                <select id="job" name="txtCategory" class="form-control form-select custom-select bg-white border-left-0 border-md">
                                                    <option value="">Chọn danh mục</option>
                                                    @foreach($categories as $c)
                                                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="control-label">Thương hiệu</label>
                                                <select id="job" name="txtBrand" class="form-control form-select custom-select bg-white border-left-0 border-md">
                                                    <option value="">Chọn thương hiệu</option>
                                                    <option value="">Dior</option>
                                                    <option value="">Zara</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="control-label">Khối lượng</label>
                                                    <div class="d-flex input-group">
                                                        <input id="weight" name="weight" type="text" class="form-control">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Gr</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="control-label">Đơn vị tính</label>
                                                    <input id="unit" name="unit" placeholder="VD: cái, chiếc, hộp, lon, gói..." type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="control-label">Khối lượng</label>
                                                <div class="input-group">
                                                    <input type="text" name="length" maxlength="255" placeholder="Dài" class="text-right form-control" inputmode="decimal" id="length" autocomplete="off" value="">
                                                    <input type="text" name="width" maxlength="255" placeholder="Rộng" class="text-right form-control" inputmode="decimal" id="width" autocomplete="off" value="">
                                                    <input type="text" name="height" maxlength="255" placeholder="Cao" class="text-right form-control" inputmode="decimal" id="height" autocomplete="off" value="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mx-auto">
                                                    <!-- Upload image input-->
                                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm  upload-image">
                                                        <input id="upload" type="file" name="thumbnail"  class="form-control border-0">
                                                    </div>
                                                    <div class="image-area"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="productdesc">Mô tả sản phẩm</label>
                                                <textarea name="editor1" id="editor1" rows="8"></textarea>
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
@stop

