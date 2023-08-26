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

                    <h3 class="mb-5">Update User</h3>
                    <div class="row form-group my-4">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="title" class="form-control"
                                value={{ $post->title }}>
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
                            <textarea name="description" id="default">{{ $post->description }}</textarea>
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
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">No file chosen...</div>
                                    <input type="file" name="image" id="chooseFile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3">
                        </div>
                        <div class="col-12 col-md-9" style="text-align:center; ">
                            <img class=""
                                src="{{ $post->image ? asset('backend/images/post') . '/' . $post->image : asset('backend/images/post/na.png') }}"
                                alt="your image" width="600"
                                style="border:1px solid gray; padding:10px; border-radius:5px" />
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
                            <input type="text" id="text-input" name="author"
                                placeholder="{{ $user->name }}" readonly class="form-control">
                            <input type="text" id="text-input" name="author" value="{{ $user->id }}"
                                readonly hidden>
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
                                    <option value="{{ $categorie->id }}" @if ($categorie->id == $post->category_id) selected @endif>
                                        {{ $categorie->name }}</option>
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
                            <input type="text" id="text-input" name="tags" placeholder="Products" class="form-control"
                                value="{{ $post->tags }}">
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
                                <option value="1" @if ($post->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($post->status == 0) selected @endif>Inactive</option>
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
                                class="form-control" value={{ $post->published_at }}>
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

        
    </script>
@endsection
