@extends('back-end.layouts.master')
@section('title', 'Chỉnh sửa quyền')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Chỉnh thông tin khách hàng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row" data-select2-id="13">
                <div class="col-12" data-select2-id="12">
                    <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="name" class="form-label">Name</label>
                                            <input value="{{ $user->name }}"
                                                   type="text"
                                                   class="form-control"
                                                   name="name"
                                                   placeholder="Name" required>

                                            @if ($errors->has('name'))
                                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input value="{{ $user->email }}"
                                                   type="email"
                                                   class="form-control"
                                                   name="email"
                                                   placeholder="Email address" required>
                                            @if ($errors->has('email'))
                                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input value="{{ $user->username }}"
                                                   type="text"
                                                   class="form-control"
                                                   name="username"
                                                   placeholder="Username" required>
                                            @if ($errors->has('username'))
                                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-control"
                                                    name="role" required>
                                                <option value="">Select role</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ in_array($role->name, $userRole)
                                                            ? 'selected'
                                                            : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role'))
                                                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                            @endif
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

