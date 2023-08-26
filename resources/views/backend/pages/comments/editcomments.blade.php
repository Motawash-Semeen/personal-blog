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

                    <h3 class="mb-5">Update Comments</h3>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Name*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" class="form-control"
                                value={{ $comment->name }}>
                            @error('name')
                                <p class="text-danger m-0">Please Provide User Name!!</p>
                            @enderror
                        </div>

                    </div>

                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Email*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" id="text-input" name="email"
                                value="{{ $comment->email }}" class="form-control">
                            @error('email')
                                <p class="text-danger m-0">Please Provide User Email!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Website</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="website"
                                value="{{ $comment->website }}" class="form-control">
                            
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">User Comments*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="comment" class="form-control">{{ $comment->comment }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="post_id" id="" class="form-control">
                                <option value="">Please Select Post</option>
                                @foreach ($posts as $post)
                                    <option value="{{ $post->id }}" @if ($post->id == $comment->post->id) selected @endif>
                                        {{ $post->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Comment Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="" class="form-control">
                                <option value="">Please Select Comment Status</option>
                                <option value="1" @if ($comment->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($comment->status == 0) selected @endif>Inactive</option>
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
