@extends('admin/layouts/master')
@section('content')
    <div class="col-md-12">

        <a href="{{route('author.create')}}" class="btn btn-primary">Add Author</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Authors</h4>
                <p class="card-category">All authors's here</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->phone }}</td>
                                <td>{{ $author->description }}</td>
                                <td>{{ $author->status }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('author.edit',$author->id) }}">Edit</a>
                                    {{ Form::open(['route'=>['author.destroy',$author->id],'method'=>'DELETE']) }}
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