@extends('back-end.layouts.master')
@section('title', 'Thêm quyền')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Thêm quyền</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Add permission</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row" data-select2-id="13">
                <div class="col-12" data-select2-id="12">
                    <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="name">Tên quyền hạn <span class="text-danger">*</span></label>
                                            <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Nhập tên quyền">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @enderror
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

