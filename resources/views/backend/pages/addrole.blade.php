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
                    <h3>Add Role</h3>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Role Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name"
                                placeholder="Editor" class="form-control">
                            </div>
                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label class=" form-control-label">Permissions</label></div>
                        <div class="col col-md-9">
                            <div class="row">

                                <div class="col col-md-12 my-4">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="select-all" name="permissions[]"
                                                value=""
                                                    class="form-check-input ">Select All
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($permissions as $permission)
                                    @php
                                        $i++;
                                    @endphp
                                    @if ($i == 1 or $i == 5 or $i == 9)
                                        <div class="col col-md-3">
                                            <div class="form-check">
                                    @endif



                                    <div class="checkbox">
                                        <label for="{{ $permission->name }}" class="form-check-label ">
                                            <input type="checkbox" id="{{ $permission->name }}" name="permissions[]" value="{{ $permission->name }}"
                                                class="form-check-input checkbox-item">{{ $permission->name }}
                                        </label>
                                    </div>
                                    @if ($i == 4 or $i == 8 or $i == 12)
                                  </div>
                                  
                                </div>
                                    @endif
                        @endforeach

                        {{-- <div class="col col-md-3">

                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="checkbox1" class="form-check-label ">
                                        <input type="checkbox" id="checkbox1" name="permissions[]" value="option1"
                                            class="form-check-input checkbox-item">Option 1
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkbox2" class="form-check-label ">
                                        <input type="checkbox" id="checkbox2" name="permissions[]" value="option2"
                                            class="form-check-input checkbox-item"> Option 2
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkbox3" class="form-check-label ">
                                        <input type="checkbox" id="checkbox3" name="permissions[]" value="option3"
                                            class="form-check-input checkbox-item"> Option 3
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-3">

                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="checkbox1" class="form-check-label ">
                                        <input type="checkbox" id="checkbox1" name="permissions[]" value="option1"
                                            class="form-check-input checkbox-item">Option 1
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkbox2" class="form-check-label ">
                                        <input type="checkbox" id="checkbox2" name="permissions[]" value="option2"
                                            class="form-check-input checkbox-item"> Option 2
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkbox3" class="form-check-label ">
                                        <input type="checkbox" id="checkbox3" name="permissions[]" value="option3"
                                            class="form-check-input checkbox-item"> Option 3
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                    </div>

            </div>

        </div>
        <div class="row form-group my-4 align-items-end justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm mx-2">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </div>

    </form>
    </div>
    </div>
    </div> <!-- .content -->
@endsection
