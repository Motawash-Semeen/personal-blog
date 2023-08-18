@extends('backend.master')
@section('content')
    <style>
        .file-upload {
            background-color: #ffffff;
            width: 100%;
            margin: 0 auto;
        }

        .file-upload-btn {
            width: 100%;
            margin: 0;
            color: #fff;
            background: #b1b1b1;
            border: none;
            padding: 10px;
            border-radius: 4px;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .file-upload-btn:hover {
            background: #b1b1b1;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
        }

        .file-upload-content {
            display: none;
            text-align: center;
        }

        .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
        }

        .image-upload-wrap {
            margin-top: 20px;
            border: 2px dashed #b1b1b1;
            position: relative;
        }

        .image-dropping,
        .image-upload-wrap:hover {
            background-color: #b1b1b1;
            border: 2px dashed #ffffff;
            color: #ffffff !important;
        }
        
        .image-upload-wrap:hover .drag-text h3{
            
            color: #ffffff !important;
        }

        .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
        }

        .drag-text {
            text-align: center;
        }

        .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #b1b1b1;
            padding: 60px 0;
        }

        .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
        }

        .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
        }

        .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
        }

        .remove-image:active {
            border: 0;
            transition: all .2s ease;
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

        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="card">
                <div class="card-body card-block">

                    <h3>Update User</h3>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="title" 
                                class="form-control">
                            @error('name')
                                <p class="text-danger m-0">Please Provide Post Title!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post
                                Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            {{-- <input type="text" id="text-input" name="description" placeholder="Products" class="form-control"> --}}
                            <textarea name="description" id="default"></textarea>
                            @error('description')
                                <p class="text-danger m-0">Please Provide Post Description!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4 d-flex align-items-center">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
        
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="image"/>
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                                class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="text-input" name="image" class="form-control">
                        </div>
                    </div> --}}
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Author Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="author" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->id }}"  readonly class="form-control">
                            @error('description')
                                <p class="text-danger m-0">Please Provide Author Name!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post Category</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="category" id="" class="form-control">
                                <option value="">Please Select Post Category</option>
                                @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                            {{-- @error('status')
                                <p class="text-danger m-0">Please Provide Valid Status!!</p>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label m-0">Post Tags</label>
                            <small class="form-text text-muted">Use Comma(,) to separate tags</small>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="tags" placeholder="Products"
                                class="form-control">
                            @error('tags')
                                <p class="text-danger m-0">Please Provide Author Name!!</p>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post
                                Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="" class="form-control">
                                <option value="">Please Select Post Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            {{-- @error('status')
                                <p class="text-danger m-0">Please Provide Valid Status!!</p>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="datePicker" class=" form-control-label">Published
                                Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="datePicker" name="date" placeholder="Products"
                                class="form-control">
                            @error('tags')
                                <p class="text-danger m-0">Please Provide Date!!</p>
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
    <script>
        tinymce.init({
            selector: 'textarea#default',
            height: 300,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menu: {
                favs: {
                    title: 'menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
        });

        document.getElementById('datePicker').valueAsDate = new Date();

        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();

                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }
        $('.image-upload-wrap').bind('dragover', function() {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function() {
            $('.image-upload-wrap').removeClass('image-dropping');
        });
    </script>
@endsection
