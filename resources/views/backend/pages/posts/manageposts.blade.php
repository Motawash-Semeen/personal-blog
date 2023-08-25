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
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">Data table</li>
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
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="d-flex justify-content-end align-items-center w-100 mb-3">
                        <a href="{{ url('admin/addpost') }}" class="all bg-success text-white p-2 rounded" title="Add">
                            <i class="ti-plus h-6 w-6 mr-1"></i>Add Post
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Post Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Post Title</th>
                                        <th>Post Description</th>
                                        <th>Post Image</th>
                                        <th>Post By</th>
                                        <th>Post Category</th>
                                        <th>Post Tags</th>
                                        <th>Post Status</th>
                                        <th>Post View</th>
                                        <th>Post Comments</th>
                                        <th>Post Published</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ strip_tags(substr($post->description,0,200)) }}...
                                            </td>
                                            <td>
                                                <img src="{{ $post->image ? asset('backend/images/post').'/'.$post->image : asset('backend/images/post/na.png') }}" alt="">
                                            </td>
                                            <td>{{ $post->user_id }}
                                            </td>
                                            <td>{{ $post->category_id }}
                                            </td>
                                            <td>{{ $post->tags }}
                                            </td>
                                            <td>
                                                @if ($post->status == 1)
                                      <a href="{{ url('admin/statusPost') }}/{{ $post->id }}" class="badge badge-success p-2">Active</a>
                                      @else
                                      <a href="{{ url('admin/statusPost') }}/{{ $post->id }}" class="badge badge-success p-2">Inactive</a>
                                      @endif
                                            </td>
                                            <td>{{ $post->view_count }}
                                            </td>
                                            <td>{{ $post->comment_count }}
                                            </td>
                                            <td>{{ $post->published_at }}
                                            </td>
                                            <td style="width: 120px">
                                                <a href="{{ url('admin/editpost') }}/{{ $post->id }}"
                                                    class="btn btn-icon waves-effect waves-light btn-success mb-2"
                                                    data-toggle="tooltip" title="title"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{ url('admin/deletepost') }}/{{ $post->id }}"
                                                    class="btn btn-icon waves-effect waves-light btn-danger mb-2"
                                                    onclick="return confirm('delete?')" data-toggle="tooltip"
                                                    title="title"> <i class="fa fa-remove"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
