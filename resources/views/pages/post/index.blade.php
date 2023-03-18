@extends('layouts.master')

@section('title')
    Post | Index
@endsection

@push('css')
    <link href="{{ asset('dashboard/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('dashboard/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container" style="max-width: 100% !important">
            <div class="container">

                <div class="row layout-top-spacing">

                    <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Post Table</h4>
                                        <a href="{{route('admin.post.create')}}">
                                            <button class="btn btn-primary">Create Post</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-4">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Content</th>
                                                <th>Image</th>
                                                <th>Date</th>
                                                <th>Deleted_at</th>
                                                <th>Delete</th>
                                                <th>Force Delete</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($posts as $key => $post)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->author }}</td>
                                                    <td>{{ $post->content }}</td>
                                                    <td>
                                                        <img width="100" src="{{ asset($post->image) }}" alt="blog_image">
                                                    </td>
                                                    <td>{{ $post->date }}</td>
                                                    <td>{{ $post->deleted_at ?? 'NULL'}}</td>
                                                    <td>
                                                        <form action="{{ route('admin.post.delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                                            <input type="submit" value="Delete" class="btn btn-dark">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.post.force-delete') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                                            <input type="submit" value="Force Delete" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.post.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $post->id }}">
                                                            <input type="submit" value="Edit" class="btn btn-warning">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

@endsection

@push('js')
    <script src="{{asset('dashboard/plugins/highlight/highlight.pack.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('dashboard/assets/js/scrollspyNav.js')}}"></script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endpush
