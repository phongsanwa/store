@extends('back-end.layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('styles')
    <link href="{{asset('store_backend/css/select2.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('store_backend/css/dropzone.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('store_backend/css/jquery-confirm.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Danh mục sản phẩm</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home-alt mr-2"></i></a></li>
                            <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="col-sm-8">
                                <div class="d-flex">
                                    <div class="search-box me-2 mb-2 d-inline-block">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Nhập ID sản phẩm">
                                            <i class="bx bx-search-alt search-icon"></i>
                                        </div>
                                    </div>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Danh mục</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-sm-end">
                                    <a href="{{ route('product.create') }}" class="text-white"><button type="button" class="btn rounded btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>Thêm mới </button></a>
                                </div>
                            </div>
                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check data-table">
                                <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle fw-bold">Ảnh</th>
                                    <th class="align-middle fw-bold">Mã vạch</th>
                                    <th class="align-middle fw-bold">Tên</th>
                                    <th class="align-middle fw-bold">Giá vốn</th>
                                    <th class="align-middle fw-bold">Giá bán</th>
                                    <th class="align-middle fw-bold">Tồn</th>
                                    <th class="align-middle fw-bold">Bán</th>
                                    <th class="align-middle fw-bold text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $p)
                                    <tr>

                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td class="dgColImagemanager text-center columnImg">
                                            <a href="#" class="icon-image-default">
                                                <img src="{{asset('/storage/public/images/'.$p->images.'')}}">
                                            </a>
                                            <div class="imageZoomHover"><img src="{{asset('/storage/public/images/'.$p->images.'')}}" alt="img-zoom"></div>
                                        </td>
                                        <td>
                                            {{ $p->sku }}
                                        </td>
                                        <td class="psName">
                                            {{ $p->product_name }}
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-success font-size-12">{{ number_format($p->price, 0,',', '.') }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-danger font-size-12">{{ number_format($p->cover_price, 0,',', '.') }}</span>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                                80
                                            </button>
                                        </td>
                                        <td class="tooltip-content">
                                            @if($p->sell === 0)
                                                <i class="badge-soft-success" data-feather="check" data-bs-toggle="tooltip" data-bs-placement="top" title="Đang bán"></i>
                                            @else
                                                <i class="badge-soft-danger" data-feather="check" data-bs-toggle="tooltip" data-bs-placement="top" title="Hết hàng"></i>
                                            @endif
                                        </td>
                                        <td class="setting-custom">
                                            <div class="d-block text-center dropdown">
                                                <a href="javascript:void(0);" class="text-black text-center dropdown-toggle"><i class="fa fa-fw fa-bars"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><button class="dropdown-item" type="button"><i class="fal fa-gift"></i>Thông tin khuyến mãi</button></li>
                                                    <li><a class="dropdown-item" href="{{ route('products.edit',$p->id) }}"><i class="fal fa-pencil"></i>Sửa sản phẩm</a></li>
                                                    <li><button class="dropdown-item" type="button"><i class="fal fa-eye"></i>Xem trên website</button></li>
                                                    <li data-name="{{ $p->product_name }}" data-id="{{ $p->id }}" class="delete-product" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $p->id }}"><button class="dropdown-item"  type="submit"><i class="fal fa-trash"></i>Xóa</button></li>
                                                </ul>
                                            </div>

                                            <form action="{{ route('products.destroy',$p->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal fade" id="exampleModal{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5 id="question" class="text-center">Bạn có chắc chắn muốn xóa: {{ $p->product_name }}?</h5>
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
                                </tbody>
                            </table>
                        </div>

                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <i class="mdi mdi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
{{-- !-- Delete Warning Modal -->  --}}
@section('scripts')
    <script src="{{ asset('store_backend/js/jquery-confirm.min.js') }}"></script>
    <script>


    </script>
@endsection
@stop







