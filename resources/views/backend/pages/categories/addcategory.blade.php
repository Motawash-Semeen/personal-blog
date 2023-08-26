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
        
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="card">
                <div class="card-body card-block">

                    <h3 class="mb-5">Add Category</h3>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="Products" class="form-control">
                            @error('name')
                                <p class="text-danger m-0">Please Provide Category Name!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="" class="form-control">
                                <option value="">Please Select Category Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            {{-- @error('status')
                                <p class="text-danger m-0">Please Provide Valid Status!!</p>
                            @enderror --}}
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
        </form>
    </div>
@endsection
