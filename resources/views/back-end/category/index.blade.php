@extends('back-end.layouts.master')
@section('title', 'Thêm sản phẩm')
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
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('home/dashboard') }}"><i class="fa fa-home-alt mr-2"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ url('products') }}">Sản phẩm</a></li>
                                <li class="breadcrumb-item active">Danh sách menu</li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Tên menu">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                        <button class="btn bg-secondary text-white me-2 mb-2 "><i class="far fa-search"></i> Lọc</button>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-sm-end">
                                        <a href="{{ url('categories/create') }}" class="text-white">
                                            <button type="button" class="btn rounded btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                <i class="mdi mdi-plus me-1"></i>
                                                Thêm Menu
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle fw-bold text-center">Tên</th>
                                        <th class="align-middle fw-bold text-center">Ảnh</th>
                                        <th class="align-middle fw-bold text-center">Icon</th>
                                        <th class="align-middle fw-bold text-center">Thứ tự</th>
                                        <th class="align-middle fw-bold text-center">Hiển thị</th>
                                        <th class="align-middle fw-bold text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($categories)
                                        @foreach($categories as $c)
                                            @if($c->parent_id == 0)
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                            <label class="form-check-label" for="orderidcheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td class="psName" data-id="{{$c->id}}">
                                                        {{$c->category_name}}
                                                    </td>
                                                    @if($c->images)
                                                    <td class="text-center">
                                                        <a class="fal fa-image fa-lg" rel="prp" data-src="" data-title=""></a>
                                                        <a title="Xóa ảnh" class="fal fa-trash text-danger icon removeImage" data-id="39465" data-link="" typeremove="removeImage"></a>
                                                    </td>
                                                    @else
                                                    <td class="text-center">
                                                        <a style="padding: 0 5px" data-bs-toggle="modal" data-bs-target="#exampleModal{{$c->id}}" title="Up ảnh" class="fal fa-plus-circle fa-lg icon text-success addImage" data-id="39465"></a>
                                                    </td>
                                                    @endif
                                                    <form action="{{ route('categories.destroy',$c->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal fade" id="exampleModal{{$c->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Upload ảnh</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input class="form-control form-control-lg" name="thumbnail" id="imageCate"  type="file" />
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Lưu ảnh</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    <td class="text-center">
                                                        <a class="fal fa-image fa-lg" rel="prp" data-src="" data-title=""></a>
                                                        <a style="padding: 0 5px" title="Up ảnh" class="fal fa-plus-circle fa-lg icon text-success addImage" data-id="39465"></a>
                                                        <a title="Xóa ảnh" class="fal fa-trash text-danger icon removeImage" data-id="39465" data-link="" typeremove="removeImage"></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="text" style="width: 50px;height:30px;text-align: right;" value="1" class="autoNumeric px-1 newOrderMenu keyCodeChange ">
                                                    </td>

                                                    <td class="text-center">
                                                        <a class="text-success fal fa-check changestatus cursor-pointer" rel="1" data-link="" data-id=""></a>
                                                    </td>
                                                    <td class="setting-custom">
                                                        <div class="d-block text-center dropdown">
                                                            <a href="javascript:void(0);" class="text-black text-center dropdown-toggle"><i class="fa fa-fw fa-bars"></i></a>
                                                            <ul class="dropdown-menu">
                                                                <li><button class="dropdown-item" type="button"><i class="fal fa-pencil"></i>Sửa Menu</button></li>
                                                                <li><button class="dropdown-item" type="button"><i class="fal fa-trash"></i>Xóa Menu</button></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($c->subcategory)
                                                @foreach($c->subcategory as $sub)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                                <label class="form-check-label" for="orderidcheck01"></label>
                                                            </div>
                                                        </td>
                                                        <td class="psName" data-id="{{$sub->id}}">
                                                            --{{$sub->category_name}}
                                                        </td>
                                                        @if($sub->images)
                                                            <td class="text-center">
                                                                <a class="fal fa-image fa-lg" rel="prp" data-src="" data-title=""></a>
                                                                <a title="Xóa ảnh" class="fal fa-trash text-danger icon removeImage" data-id="39465" data-link="" typeremove="removeImage"></a>
                                                            </td>
                                                        @else
                                                            <td class="text-center">
                                                                <a style="padding: 0 5px" title="Up ảnh" class="fal fa-plus-circle fa-lg icon text-success addImage" data-id="39465"></a>
                                                            </td>
                                                        @endif
                                                        <td class="text-center">
                                                            <a class="fal fa-image fa-lg" rel="prp" data-src="" data-title=""></a>
                                                            <a style="padding: 0 5px" title="Up ảnh" class="fal fa-plus-circle fa-lg icon text-success addImage" data-id="39465"></a>
                                                            <a title="Xóa ảnh" class="fal fa-trash text-danger icon removeImage" data-id="39465" data-link="" typeremove="removeImage"></a>
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="text" style="width: 50px;height:30px;text-align: right;" value="1" class="autoNumeric px-1 newOrderMenu keyCodeChange ">
                                                        </td>

                                                        <td class="text-center">
                                                            <a class="text-success fal fa-check changestatus cursor-pointer" rel="1" data-link="" data-id=""></a>
                                                        </td>
                                                        <td class="setting-custom">
                                                            <div class="d-block text-center dropdown">
                                                                <a href="javascript:void(0);" class="text-black text-center dropdown-toggle"><i class="fa fa-fw fa-bars"></i></a>
                                                                <ul class="dropdown-menu">
                                                                    <li><button class="dropdown-item" type="button"><i class="fal fa-pencil"></i>Sửa Menu</button></li>
                                                                    <li data-name="{{ $sub->product_name }}" data-id="{{ $sub->id }}" class="delete-product" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $sub->id }}"><button class="dropdown-item" type="button"><i class="fal fa-trash"></i>Xóa Menu</button></li>
                                                                </ul>
                                                            </div>
                                                            <form action="{{ route('categories.destroy',$sub->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal fade" id="exampleModal{{ $sub->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa?</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h5 id="question" class="text-center">Bạn có chắc chắn muốn xóa: {{ $sub->category_name }}?</h5>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-danger"><i class="fal fa-check"></i>Có</button>
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fal fa-times"></i>Không</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td colspan="4"></td>
                                        <td class="text-center">
                                            <a class="btn btn-success" id="saveOrderMenu" href="javascript:;"><i class="fal fa-save mr-1"></i> Lưu</a>
                                        </td>
                                        <td colspan="3"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="paginator-content">
                                {{$paginator->links('back-end.layouts.pagination')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@stop
