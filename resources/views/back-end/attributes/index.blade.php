@extends('back-end.layouts.master')
@section('title', 'Danh sách thuộc tính')
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
                                <li class="breadcrumb-item active">Danh sách thuộc tính</li>
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
                                        <a href="{{ route('attributes.create') }}" class="text-white">
                                            <button type="button" class="btn rounded btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                                                <i class="mdi mdi-plus me-1"></i>
                                                Thêm thuộc tính
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    @if($attributes)
                                        <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;" class="align-middle">
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th width="1%">No</th>
                                            <th class="align-middle fw-bold text-center">Tên</th>
                                            <th class="align-middle fw-bold text-center">Giá trị</th>
                                            <th class="align-middle fw-bold text-center">Frontend Type</th>
                                            <th class="align-middle fw-bold text-center">Filterable</th>
                                            <th class="align-middle fw-bold text-center">Required</th>
                                            <th class="align-middle fw-bold text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($attributes as $p)
                                                <tr>
                                                    <td>
                                                        <div class="form-check font-size-16">
                                                            <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                            <label class="form-check-label" for="orderidcheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $p->id }}
                                                    </td>
                                                    <td class="psName">
                                                        {{ $p->name }}
                                                    </td>
{{--                                                    @if($p->attributes->count() > 0)--}}
{{--                                                        <td class="text-center"><a href="">{{ $post->attribute->count() }}</a></td>--}}
{{--                                                    @elseif($p->attributes->count() <= 0)--}}
{{--                                                        <td class="text-center">{{ $p->attribute->count() }}</td>--}}
{{--                                                    @endif--}}
                                                    <td class="text-center"><a href="">6</a></td>
                                                    <td>{{ $p->frontend_type }}</td>
                                                    <td class="text-center">
                                                        @if ($p->is_filterable == 1)
                                                            <span class="badge badge-success text-black">Yes</span>
                                                        @else
                                                            <span class="badge badge-danger text-black">No</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($p->is_required == 1)
                                                            <span class="badge badge-success text-black">Yes</span>
                                                        @else
                                                            <span class="badge badge-danger text-black">No</span>
                                                        @endif
                                                    </td>
                                                    <td class="setting-custom">
                                                        <div class="d-block text-center dropdown">
                                                            <a href="javascript:void(0);" class="text-black text-center dropdown-toggle"><i class="fa fa-fw fa-bars"></i></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="{{ route('attributes.edit',$p->id) }}"><i class="fal fa-pencil"></i>Sửa thuộc tính</a></li>
                                                                <li data-name="{{ $p->name }}" data-id="{{ $p->id }}" class="delete-product" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $p->id }}"><button class="dropdown-item" type="button"><i class="fal fa-trash"></i>Xóa Menu</button></li>
                                                            </ul>
                                                        </div>
                                                        <form action="{{ route('attributes.destroy',$p->id) }}" method="POST">
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
                                                                            <h5 id="question" class="text-center">Bạn có chắc chắn muốn xóa: {{ $p->name }}?</h5>
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
                                            <tr>
                                                <td colspan="4"></td>
                                                <td class="text-center">
                                                    <a class="btn btn-success" id="saveOrderMenu" href="javascript:;"><i class="fal fa-save mr-1"></i> Lưu</a>
                                                </td>
                                                <td colspan="3"></td>
                                            </tr>
                                        </tbody>
                                    @else
                                        <div class="index-be">
                                            Chưa có sản phẩm nào được thêm vào
                                        </div>
                                    @endif
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
