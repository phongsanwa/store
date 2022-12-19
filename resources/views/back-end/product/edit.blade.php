@extends('back-end.layouts.master')
@section('title', 'Sửa sản phẩm')
@section('styles')
    <link href="{{asset('store_backend/css/select2.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('store_backend/css/dropzone.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
@endsection
@section('scripts')
    <script>
        if($('#editor1').length){
            CKEDITOR.replace( 'editor1',{
                filebrowserUploadUrl: '{{ route('upload', ['_token' => csrf_token()]) }}',
                filebrowerUploadMethod: 'form'
            });
        }
    </script>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Sửa sản phẩm</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Sửa sản phẩm</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row" data-select2-id="13">
                <div class="col-12" data-select2-id="12">
                    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="productname">Tên sản phẩm <span class="text-danger">*</span></label>
                                            <input id="product-name" name="product_name" value="{{$product->product_name}}" type="text" class="form-control">
                                            @error('product_name')
                                            <div class="alert alert-danger">{{ $errors->first('product_name') }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="manufacturername">Mô tả ngắn </label>
                                            <input value="{{$product->description}}" id="description" name="description" type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="manufacturerbrand">SKU</label>
                                            <input value="{{$product->sku}}" id="sku" name="sku" type="text" class="form-control">
                                        </div>
                                        <div class="row d-flex">
                                            <div class="mb-3 col-md-6">
                                                <label for="price">Giá vốn</label>
                                                <input value="{{$product->price}}" id="price" name="price" type="text" class="form-control price-change">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="cover_price">Giá bán</label>
                                                <input value="{{$product->cover_price}}" id="cover_price" name="cover_price" type="text"  class="form-control price-change">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 right-create" data-select2-id="8">
                                        <div class="mb-3" data-select2-id="7">
                                            <label class="control-label">Danh mục <span class="text-danger">*</span></label>
                                            <select id="job" name="txtCategory" class="form-control form-select custom-select bg-white border-left-0 border-md">
                                                @foreach($categories as $c)
                                                    <option value="{{$c->id}}"
                                                    @if($product->category_id == $c->id) @endif>{{$c->category_name}}</option>
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
                                                    <input value="{{$product->images}}" id="upload" type="file" name="thumbnail"  class="form-control border-0">
                                                </div>
                                                <div class="image-area"><img id="imageResult" src="{{asset('/storage/public/images/'.$product->images.'')}}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="productdesc">Mô tả sản phẩm</label>
                                            <textarea name="editor1" id="editor1" rows="8">
                                                {{$product->content}}
                                            </textarea>
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
@section('scripts')
    <script src="{{ asset('store_backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('store_backend/js/dropzone.min.js') }}"></script>
@endsection

