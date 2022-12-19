@extends('back-end.layouts.master')
@section('title', 'Chỉnh vai trò')
@section('scripts')
    <script>
        $('[name="all_permission"]').click(function () {
            if ($(this).is(':checked')){
                $.each($('.permission'), function() {
                    $(this).prop('checked',true);
                });
            }else{
                $.each($('.permission'), function() {
                    $(this).prop('checked',false);
                });
            }
        });
    </script>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Chỉnh vai trò</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Edit role</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row" data-select2-id="13">
                <div class="col-12" data-select2-id="12">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
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
                                            <label for="name">Tên vai trò <span class="text-danger">*</span></label>
                                            <input id="name" name="name" type="text" class="form-control" value="{{ $role->name  }}" placeholder="Nhập tên quyền">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <label for="permissions" class="form-label">Gán quyền</label>

                                <table class="table table-striped">
                                    <thead>
                                    <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                    <th scope="col" width="20%">Tên quyền</th>
                                    <th scope="col" width="1%">Guard</th>
                                    </thead>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox"
                                                       name="permission[{{ $permission->name }}]"
                                                       value="{{ $permission->name }}"
                                                       class='permission'
                                                    {{ in_array($permission->name, $rolePermissions)
                                                        ? 'checked'
                                                        : '' }}>
                                            </td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
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

