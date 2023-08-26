@extends('backend.master')
@section('content')

@php
      $timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
@endphp
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

                    <h3>Update Site Section</h3>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Default Timezone*</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <select name="time_zone" id="" class="form-control">
                            @foreach ( $timezones as $timezone )
                            <option value="{{ $timezone }}" @if ($site->time_zone == $timezone)
                                selected
                            @endif>{{ $timezone }}</option>
                            @endforeach
                        </select>
                            @error('time_zone')
                                <p class="text-danger m-0">Please Provide Valid Host!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Default Language*</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <select name="default_language" id="" class="form-control">
                                    <option value="en">English</option>
                                    <option value="bn">Bangla</option>
                                    <option value="ur">Urdhu</option>
                                </select>
                            @error('default_language')
                                <p class="text-danger m-0">Please Provide valid Port!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Name*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="site_name" class="form-control"
                                value="{{ $site->site_name	 }}">
                            @error('site_name')
                                <p class="text-danger m-0">Please Provide Site Name!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Logo*</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" name="site_logo" id="chooseFile">
                                    </div>
                                </div>
                                <img src="{{ asset('backend/images/logo/'.$site->site_logo) }}" alt="" width="300" class="mt-3" style="border:1px solid rgb(207, 207, 207); padding:10px; border-radius:5px">
                            @error('site_logo')
                                <p class="text-danger m-0">Please Provide Site Logo!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Favicon*</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="favicon-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFiles">No file chosen...</div>
                                    <input type="file" name="site_favicon" id="favicon">
                                </div>
                                <img src="{{ asset('backend/images/favicon/'.$site->site_favicon) }}" alt="" width="100" class="mt-3" style="border:1px solid rgb(207, 207, 207); padding:10px; border-radius:5px">
                            </div>
                            @error('site_favicon')
                                <p class="text-danger m-0">Please Provide Site Favicon!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                      <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email*</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <input type="email" id="text-input" name="site_email" class="form-control"
                        value="{{ $site->site_email	 }}">
                          @error('site_email')
                              <p class="text-danger m-0">Please Provide Valid Email!!</p>
                          @enderror
                      </div>
                  </div>
                    <div class="row form-group my-4">
                      <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description*</label>
                      </div>
                      <div class="col-12 col-md-9">
                          <textarea name="site_description" class="form-control">{{ $site->site_description	 }}</textarea>
                          
                      </div>
                  </div>
                    <div class="row form-group my-4">
                      <div class="col col-md-3"><label for="text-input" class=" form-control-label">Site Keywords*</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <textarea name="site_keywords" class="form-control">{{ $site->site_keywords	 }}</textarea>
                          
                      </div>
                  </div>
                    <div class="row form-group my-4">
                      <div class="col col-md-3"><label for="text-input" class=" form-control-label">Copyright Text*</label>
                      </div>
                      <div class="col-12 col-md-9">
                        <textarea name="site_copyright" class="form-control">{{ $site->site_copyright	 }}</textarea>
                          
                      </div>
                  </div>

                  <hr>

                  <h4 class="m-t-0 header-title">Social Links</h4>

                  <div class="row form-group my-4">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Facebook URL*</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="text-input" name="web_fb_link" class="form-control"
                      value="{{ $site->web_fb_link ? $site->web_fb_link : "#"	 }}">
                        
                    </div>
                </div><div class="row form-group my-4">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Twitter URL*</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="text-input" name="web_twitter_link" class="form-control"
                      value="{{ $site->web_twitter_link ? $site->web_twitter_link : "#"	 }}">
                        
                    </div>
                </div><div class="row form-group my-4">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Instagram URL*</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="text-input" name="web_instagram_link" class="form-control"
                      value="{{ $site->web_instagram_link ? $site->web_instagram_link : "#"	 }}">
                        
                    </div>
                </div>
                <div class="row form-group my-4">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Linkedin URL*</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="text-input" name="web_linkedin_link" class="form-control"
                      value="{{ $site->web_linkedin_link ? $site->web_linkedin_link : "#"	 }}">
                        
                    </div>
                </div>
                <div class="row form-group my-4">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Youtube URL*</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="text-input" name="web_youtube_link" class="form-control"
                      value="{{ $site->web_youtube_link	? $site->web_youtube_link : "#" }}">
                        
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
