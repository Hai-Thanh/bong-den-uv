@extends('admin.layouts.admin')

@section('title', 'Sửa bài viết')

@section('content')
    <div class="main-content-container container-fluid px-4">
        @include('admin.partials.title-content', ['name'=>'Sửa bài viết'])
        <form action="{{ route('posts.update', ['id' =>$post->id]) }}" method="POST" class="add-new-post">

            @csrf
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!-- Add New Post Form -->
                    <div class="card card-small mb-3">
                        <div class="card-body">
                            <input class="form-control form-control-lg mb-3" value="{{ $post->title }}" name="title" type="text"
                                placeholder="Your Post Title">
                            <input class="form-control form-control-lg mb-3" value="{{ $post->description }}" name="description" type="text"
                                placeholder="Your Post Description">
                            <textarea name="content"  class="add-new-post__editor form-control"
                                cols="118" rows="10">{{ $post->content }}</textarea>
                            <br>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="image_path" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="image_path" value="{{ $post->image_path }}" class="form-control" type="text"
                                    name="image_path">
                            </div>
                            <div id="holder">
                                <img width="300px" height="300px" src="{{ $post->image_path }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <!-- Post Overview -->
                    <div class='card card-small mb-3'>
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Actions</h6>
                        </div>
                        <div class='card-body p-0'>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <span class="d-flex mb-2">
                                        <i class="material-icons mr-1">flag</i>
                                        <strong class="mr-1">Status:</strong> Draft
                                    </span>
                                    <span class="d-flex mb-2">
                                        <i class="material-icons mr-1">visibility</i>
                                        <strong class="mr-1">Visibility:</strong>
                                        <strong class="text-success">Public</strong>
                                    </span>
                                    <span class="d-flex mb-2">
                                        <i class="material-icons mr-1">calendar_today</i>
                                        <strong class="mr-1">Schedule:</strong> Now
                                    </span>
                                    <span class="d-flex">
                                        <i class="material-icons mr-1">score</i>
                                        <strong class="mr-1">Readability:</strong>
                                        <strong class="text-warning">Ok</strong>
                                    </span>
                                </li>
                                <li class="list-group-item d-flex px-3">
                                    <button class="btn btn-sm btn-accent ml-auto">
                                        <i class="material-icons">file_copy</i> Publish</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- / Post Overview -->
                    <!-- Post Overview -->
                    <div class='card card-small mb-3'>
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Categories</h6>
                        </div>
                        <div class='card-body p-0'>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-3 pb-2">
                                    @foreach ($tags as $tag)
                                        <div class="custom-control custom-checkbox mb-1">
                                            @if (count($post->tagPost))
                                                @foreach ($post->tagPost as  $ps)
                                                <input {{ $ps->id == $tag->id ? "checked" : "" }} type="checkbox" name="tag[]" value="{{ $tag->id }}" class="custom-control-input" id="posts_{{ $tag->id }}">
                                                @endforeach
                                            @else
                                              <input type="checkbox" name="tag[]" value="{{ $tag->id }}" class="custom-control-input" id="posts_{{ $tag->id }}">
                                            @endif
                                            <label class="custom-control-label"
                                                for="posts_{{ $tag->id }}">{{ $tag->name }}</label>
                                        </div>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection

@section('css')
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0"
        href="{{ asset('/shards/styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('shards/styles/extras.1.1.0.min.css') }}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css">
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('shards/scripts/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('shards/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
    <script src="{{ asset('shards/scripts/app/app-blog-new-post.1.1.0.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script src="{{ asset('admins/products/add.js') }}"></script>
@endsection
