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
            <div class="col-sm-12 top-msg">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">

                    <span class="badge badge-pill badge-success">{{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        @endif
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="card">
                <div class="card-body card-block">

                    <h3 class="mb-5">Update Home Section</h3>

                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Featured Title*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="featured_title" class="form-control"
                                value="{{ $home->featured_title }}">
                            @error('featured_title')
                                <p class="text-danger m-0">Please Provide Featured Title!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Featured Poster*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">No file chosen...</div>
                                    <input type="file" name="featured_image" id="chooseFile">
                                </div>
                            </div>
                            <img src="{{ asset('backend/images/logo/' . $home->featured_image) }}" alt=""
                                width="300" class="mt-3"
                                style="border:1px solid rgb(207, 207, 207); padding:10px; border-radius:5px">
                            @error('featured_image')
                                <p class="text-danger m-0">Please Provide Featured Poster!!</p>
                            @enderror
                        </div>

                    </div>

                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="featured_post_id" id="" class="form-control">
                              
                              @if ($posts->count() > 0)
                              <option>Please Select Post</option>
                              @foreach ($posts as $post)
                              <option value="{{ $post->id }}" @if ($home->featured_post_id == $post->id) selected @endif>
                                  {{ $post->id }}</option>
                          @endforeach
                              @else
                              <option>No Post Found</option>
                              @endif
                                
                            </select>
                            @error('featured_post_id')
                                <p class="text-danger m-0">Please Provide Valid Post!!</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="featured_status" id="" class="form-control">

                                <option value=1 @if ($home->featured_status == 1) selected @endif>Active</option>
                                <option value=0 @if ($home->featured_status == 0) selected @endif>Inactive</option>


                            </select>
                            @error('featured_status')
                                <p class="text-danger m-0">Please Provide Valid Post!!</p>
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
        </form>
    </div>
@endsection
