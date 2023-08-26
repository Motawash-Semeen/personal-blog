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
                    <a href="{{ url('admin/add-gallaries') }}" class="all bg-success text-white p-2 rounded" title="Add">
                        <i class="ti-plus h-6 w-6 mr-1"></i>Add Gallary
                    </a>
                </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Post Gallary</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Gallary</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gallaries as $gallary)
                                        <tr>
                                            <td>
                                                <img src="{{ $gallary->image ? asset('backend/images/gallary/') . '/' . $gallary->image : asset('backend/images/post/na.png') }}"
                                                    alt="" width="100">
                                            </td>

                                            <td>
                                                @if ($gallary->status == 1)
                                                    <a href="{{ url('admin/status-gallaries') }}/{{ $gallary->id }}"
                                                        class="badge badge-success p-2">Active</a>
                                                @else
                                                    <a href="{{ url('admin/status-gallaries') }}/{{ $gallary->id }}"
                                                        class="badge badge-success p-2">Inactive</a>
                                                @endif
                                            </td>
                                            <td style="width: 120px">
                                                <a href="{{ url('admin/edit-gallaries') }}/{{ $gallary->id }}"
                                                    class="btn btn-icon waves-effect waves-light btn-success mb-2"
                                                    data-toggle="tooltip" title="title"> <i class="fa fa-edit"></i> </a>
                                                    <a href="{{ url('admin/delete-gallaries') }}/{{ $gallary->id }}"
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
