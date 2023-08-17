@extends('backend.master')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    @if (session()->has('message'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">

                <span class="badge badge-pill badge-success">{{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <h3>Update User</h3>
                <div class="row form-group my-4">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="name" placeholder="Joe Doe" class="form-control" value="{{ $user->name }}">
                        @error('name')
                        <p class="text-danger m-0">Please Provide Your Name!!</p>
                    @enderror
                    </div>
                    
                </div>
                <div class="row form-group my-4">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="text-input" name="email" placeholder="abc@hotmail.com" class="form-control" value="{{ $user->email }}">
                        @error('email')
                        <p class="text-danger m-0">Please Provide Your Valid Email!!</p>
                    @enderror
                    </div>
                </div>
                <div class="row form-group my-4">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="text-input" name="image" class="form-control">
                        <img src="@if ($user->image == NULL){{ asset('assets/imgs') }}/avatar-3.jpg" @else {{ asset('backend/images/user') }}/{{ $user->image }}"
                                        @endif alt="{{ $user->name.'-image' }}" style="width: 100px; margin: 10px 0px;">
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select Role</label></div>
                    <div class="col-12 col-md-9">
                        <select name="role" id="select" class="form-control">
                            <option>Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if ($user->hasRole($role->name))
                                selected
                            @endif>{{ $role->name }}</option>
                            @endforeach
                            
                        </select>
                        @error('role')
                        <p class="text-danger m-0">Please Select a Role!!</p>
                    @enderror
                    </div>
                </div>
        </div>

    </div>
    <div class="row form-group my-4 align-items-end justify-content-end">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button type="reset" class="btn btn-danger btn-sm mx-3">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
</div>

</form>
</div>
</div>
</div> <!-- .content -->
@endsection