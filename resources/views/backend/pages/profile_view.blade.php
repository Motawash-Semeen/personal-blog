@extends('backend.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .file {
            position: relative;
            overflow: hidden;
            /* margin-top: -20%; */
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
    </style>
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
        <div class="container">
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
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    
                                    <img src="{{ $user->profile_image ? asset('backend/images/'.$user->profile_image) : 'https://bootdey.com/img/Content/avatar/avatar6.png' }}" alt="Admin"
                                        class="rounded-circle p-1 bg-primary mb-2" width="110" height="110">
                                    <!-- Profile picture help block-->
                                    {{-- <div class="small font-italic text-muted mb-2">Upload a different photo...</div> --}}
                                    <!-- Profile picture upload button-->
                                    <div class="file btn btn-lg btn-primary">
                                        Change Photo
                                        <input type="file" name="image" id="imageInput" />
                                    </div>
                                    <input type="text" value="{{ $user->profile_image }}" name="old_img" hidden />
                                    <div class="mt-3">
                                        <h4>{{ $user->name }}</h4>
                                        <p class="text-secondary mb-1">{{ $user->description }}</p>
                                        <p class="text-muted font-size-sm">{{ ucfirst($role[0]) }}</p>

                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0 d-flex  align-items-center "><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path
                                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                                </path>
                                            </svg>Website</h6>
                                        <span class="text-secondary">{{ $user->website ? $user->website : '#' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0 d-flex  align-items-center "><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" enable-background="new 0 0 32 32"
                                                viewBox="0 0 32 32" id="linkedin">
                                                <path fill="#FFF"
                                                    d="M4.983,8.375H4.94c-2.087,0-3.44-1.367-3.44-3.101c0-1.767,1.393-3.106,3.523-3.106
                                            c2.127,0,3.436,1.335,3.477,3.101C8.5,7.002,7.15,8.375,4.983,8.375z">
                                                </path>
                                                <path fill="#80D8FF"
                                                    d="M8.5,5.27C8.475,4.184,7.967,3.264,7.087,2.714C6.903,2.692,6.721,2.669,6.523,2.669
                                            C4.393,2.669,3,4.008,3,5.775c0,1.072,0.52,2.001,1.408,2.556C4.582,8.352,4.755,8.375,4.94,8.375h0.043
                                            C7.15,8.375,8.5,7.002,8.5,5.27z">
                                                </path>
                                                <path fill="#455A64"
                                                    d="M4.983,8.875H4.94C2.657,8.875,1,7.361,1,5.275c0-2.089,1.692-3.606,4.023-3.606
                                            c2.292,0,3.928,1.476,3.977,3.589C9,7.359,7.311,8.875,4.983,8.875z M5.023,2.669C3.243,2.669,2,3.741,2,5.275
                                            c0,1.531,1.209,2.601,2.94,2.601h0.043C6.76,7.875,8,6.804,8,5.27C7.963,3.694,6.795,2.669,5.023,2.669z">
                                                </path>
                                                <rect width="5" height="18" x="2.5" y="10.5"
                                                    fill="#FFF"></rect>
                                                <path fill="#80D8FF" d="M7.5,28.5H4V12c0-0.552,0.447-1,1-1h2.5V28.5z">
                                                </path>
                                                <path fill="#455A64"
                                                    d="M7.5,29h-5C2.224,29,2,28.776,2,28.5v-18C2,10.224,2.224,10,2.5,10h5C7.776,10,8,10.224,8,10.5v18
                                            C8,28.776,7.776,29,7.5,29z M3,28h4V11H3V28z">
                                                </path>
                                                <path fill="#FFF"
                                                    d="M23.5,10.5c-2.457,0-4.632,1.188-6,3.014V10.5h-6v18H16h1.5V19c0-1.933,1.567-3.5,3.5-3.5
                                            s3.5,1.567,3.5,3.5v9.5h6v-11C30.5,13.634,27.366,10.5,23.5,10.5z">
                                                </path>
                                                <path fill="#80D8FF"
                                                    d="M23.724,12.005c-1.884,0.069-3.586,0.835-4.866,2.046C18.532,14.359,18,14.151,18,13.703v-0.784
                                            c-0.176,0.19-0.345,0.387-0.5,0.595V11H14c-0.553,0-1,0.448-1,1v16.5h3h1.5V19c0-1.933,1.567-3.5,3.5-3.5
                                            c1.077,0,2.029,0.498,2.672,1.264C24.479,17.405,25,18.389,25,19.5v9h5.5v-11c0-0.372-0.037-0.734-0.094-1.09
                                            C29.288,13.783,26.708,11.896,23.724,12.005z">
                                                </path>
                                                <path fill="#455A64"
                                                    d="M30.5,29h-6c-0.276,0-0.5-0.224-0.5-0.5V19c0-1.654-1.346-3-3-3s-3,1.346-3,3v9.5
                                            c0,0.276-0.224,0.5-0.5,0.5h-6c-0.276,0-0.5-0.224-0.5-0.5v-18c0-0.276,0.224-0.5,0.5-0.5h6c0.276,0,0.5,0.224,0.5,0.5v3.014
                                            c0,0.276-0.224,0.5-0.5,0.5s-0.5-0.224-0.5-0.5V11h-5v17h5v-9c0-2.206,1.794-4,4-4s4,1.794,4,4v9h5V17.5c0-3.584-2.916-6.5-6.5-6.5
                                            c-1.384,0-2.722,0.406-3.871,1.173c-0.229,0.152-0.54,0.092-0.693-0.138s-0.092-0.54,0.139-0.693C20.388,10.464,21.918,10,23.5,10
                                            c4.136,0,7.5,3.364,7.5,7.5v11C31,28.776,30.776,29,30.5,29z">
                                                </path>
                                            </svg>Linkedin</h6>
                                        <span class="text-secondary">{{ $user->linkedin ? $user->linkedin : '#' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0 d-flex  align-items-center "><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-twitter me-2 icon-inline text-info">
                                                <path
                                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                </path>
                                            </svg>Twitter</h6>
                                        <span class="text-secondary">{{ $user->twitter ? $user->twitter : '#' }}</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0 d-flex  align-items-center "><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-instagram me-2 icon-inline text-danger">
                                                <rect x="2" y="2" width="20" height="20"
                                                    rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5">
                                                </line>
                                            </svg>Instagram</h6>
                                        <span
                                            class="text-secondary">{{ $user->instagram ? $user->instagram : '#' }}</span>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0 d-flex  align-items-center "><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-facebook me-2 icon-inline text-primary">
                                                <path
                                                    d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                </path>
                                            </svg>Facebook</h6>
                                        <span class="text-secondary">{{ $user->facebook ? $user->facebook : '#' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <form action="" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $user->email }}"
                                                readonly name="email">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $user->phone }}" name="phone">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Description</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $user->description }}" name="description">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="{{ $user->address }}" name="address">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Website</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $user->website ? $user->website : '#' }}" name="website">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Linkedin</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $user->linkedin ? $user->linkedin : '#' }}" name="linkedin">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">twitter</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $user->twitter ? $user->twitter : '#' }}" name="twitter">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Instagram</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $user->instagram ? $user->instagram : '#' }}" name="instagram">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Facebook</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"
                                                value="{{ $user->facebook ? $user->facebook : '#' }}" name="facebook">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .content -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                uploadImage(file);
            }
        });

        function uploadImage(file) {
            const formData = new FormData();
            formData.append('image', file);

            fetch('/admin/image_upload', {
                method: 'POST', // Use POST method
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            // .then(response => response.json())
            // .then(data => {
            //     console.log(data);
            // })
            // .catch(error => {
            //     console.error(error);
            // });
        }
    </script>
@endsection
