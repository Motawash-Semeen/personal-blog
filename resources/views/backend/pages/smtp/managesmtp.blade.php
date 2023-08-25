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

                    <h3>Update SMTP</h3>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Host*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="mail_host" class="form-control"
                                value="{{ $smtps->mail_host }}">
                            @error('mail_host')
                                <p class="text-danger m-0">Please Provide Valid Host!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Port*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="mail_port" class="form-control"
                                value="{{ $smtps->mail_port }}">
                            @error('mail_port')
                                <p class="text-danger m-0">Please Provide valid Port!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="mail_email" class="form-control"
                                value="{{ $smtps->mail_email }}">
                            @error('mail_email')
                                <p class="text-danger m-0">Please Provide Email!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="text-input" name="mail_password" class="form-control"
                                value="{{ $smtps->mail_password }}">
                            @error('mail_password')
                                <p class="text-danger m-0">Please Provide Password!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                      <div class="col col-md-3"><label for="text-input" class=" form-control-label">Encryption*</label>
                      </div>
                      <div class="col-12 col-md-9">
                          <select name="mail_encryption" id="" class="form-control">
                              <option value="TLS" @if ($smtps->mail_encryption == 'TLS')
                                selected
                              @endif>TLS</option>
                              <option value="SSL" @if ($smtps->mail_encryption == 'SSL')
                                selected
                              @endif>SSL</option>
                          </select>
                          @error('mail_encryption')
                              <p class="text-danger m-0">Please Provide Valid Status!!</p>
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
