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
                        <form action="/categories" method="POST" class="form-add-custom mt-3" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-general-input col-12">
                                <ul class="nav-config  nav nav-tabs nav-tabs-bottom mb-0 pl-3">
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" class="nav-link tab-default  active">
                                            Danh mục cha
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="cate-child tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="col-12 col-lg-10" data-select2-id="6">
                                            <div class="card-body" data-select2-id="5">
                                                <input type="hidden" name="storeId" id="storeId" class="required" value="114184">								                                <div class="form-group mb-2" data-select2-id="4">
                                                    <label>Danh mục</label>
                                                    <select class="form-select form-select-lg mb-3" id="parent_id" name="txtCode" aria-label="form-select-lg example">
                                                        <option selected value="0">Chọn danh mục</option>
                                                        @foreach($categories as $c)
                                                            <option selected value="{{$c->id}}">{{$c->category_name}}</option>
                                                            @if($c->subcategory)
                                                                @foreach($c->subcategory as $sub)
                                                                    <option value="{{$sub->id}}">--{{$sub->category_name}}</option>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <div class="form-group mb-2">
                                                        <label>Tên<span class="text-danger">*</span></label>
                                                        <input type="text" name="txtNameCategory" maxlength="255" class="required form-control" id="name" autocomplete="off" value="">
                                                        <div class="error"></div>
                                                    </div>
                                                    {{--                                        <div class="form-group mb-2">--}}
                                                    {{--                                            <label>Mã danh mục<span class="text-danger">*</span></label>--}}
                                                    {{--                                            <input type="text" name="txtCode" maxlength="255" class="required form-control" id="code" autocomplete="off" value="">--}}
                                                    {{--                                            <div class="error"></div>--}}
                                                    {{--                                        </div>--}}
                                                    <div class="form-group mb-2">
                                                        <label>Thứ tự danh mục<span class="text-danger">*</span></label>
                                                        <input type="text" name="txtOrder" maxlength="255" class="required form-control" id="code" autocomplete="off" value="">
                                                        <div class="error"></div>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label>Ảnh danh mục<span class="text-danger"></span></label>
                                                        <input class="form-control form-control-lg" name="thumbnail" id="imageCate"  type="file" />
                                                        <div class="error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 save-cate">
                                            <div class="form-group mb-2 row">
                                                <div class="col-12 col-lg-4">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">Sau khi thêm dữ liệu: </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <span class="uniform-choice"><span class="checked"><input value="/website/menu/index?tab=add" type="radio" class="form-check-input-styled" name="afterSubmit" checked="checked" data-fouc=""></span></span>
                                                            Tiếp tục thêm Menu
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <span class="uniform-choice"><span class=""><input value="/website/menu/index?storeId=114184" type="radio" class="form-check-input-styled" name="afterSubmit" data-fouc=""></span></span>
                                                            Hiện danh sách Menu
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group  mt-4 mb-4 row">
                                                <div class="col-lg-8">
                                                    <button id="btnSaveForm" type="submit" class="btn btn-success">
                                                        <i class="fal fa-save mr-2"></i> Lưu
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@stop
