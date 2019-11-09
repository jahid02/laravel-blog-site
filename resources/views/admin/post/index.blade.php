@extends('admin.layouts.master')
@section('content')
    <div class="col-md-12">
        <a href="{{ route('post.create') }}" class="btn btn-primary">Add New</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Posts</h4>
                <p class="card-category"> All post here</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Short Description</th>
                        <th>Published Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->relAuthor->name }}</td>
                                <td>{{ $post->short_description }}</td>
                                <td>{{ $post->published_date }}</td>
                                <td>{{ $post->status }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('post.edit',$post->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('post.show',$post->id) }}">Show</a>
                                    {{ Form::open(['route'=>['post.destroy',$post->id],'method'=>'DELETE']) }}
                                    {{ Form::submit('Delete',['onclick'=>"return confirm('Are you confirm ?')"]) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection