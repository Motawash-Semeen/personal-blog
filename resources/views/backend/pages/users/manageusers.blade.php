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
                    <a href="{{ url('admin/adduser') }}" class="all bg-success text-white p-2 rounded" title="Add">
                      <i class="ti-plus h-6 w-6 mr-1"></i>Add User
                    </a>
                  </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body" style="overflow-x: auto;">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Image</th>
                                        <th>User Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($users as $user)
                                  <tr>
                                    <td style="width: 200px">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="@if ($user->profile_image == NULL){{ asset('assets/imgs') }}/avatar-3.jpg" @else {{ asset('backend/images/') }}{{ "/" }}{{ $user->profile_image }}"
                                        @endif alt="{{ $user->name.'-image' }}" style="width: 100px">
                                    </td>
                                    {{-- <td>{{ $user->getRoleNames() }}</td> --}}
                                    <td>@foreach ($user->getRoleNames() as $role)
                                        <div class="">
                                            <span class="badge badge-success">{{ $role }}</span>
                                        </div>
                                    @endforeach</td>
                                    <td style="width: 120px">
                                        <a href="{{ url('admin/edituser') }}/{{ $user->id }}"
                                            class="btn btn-icon waves-effect waves-light btn-success mb-2"
                                            data-toggle="tooltip" title="title"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ url('admin/deleteuser') }}/{{ $user->id }}" class="btn btn-icon waves-effect waves-light btn-danger mb-2"
                                            onclick="return confirm('delete?')" data-toggle="tooltip" title="title"> <i
                                                class="fa fa-remove"></i> </a>
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
