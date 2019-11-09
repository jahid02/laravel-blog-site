@extends('admin/layouts/master')
@section('content')
    <div class="col-md-12">
        <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Categories</h4>
                <p class="card-category">All category's here</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Actions
                        </th>

                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->status}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('category.edit', $category->id)}}">Edit</a>
{{--
                                    <form action="{{route('category.destroy', $category->id)}}" method="post">
--}}
                                    {{Form::open(['route'=>['category.destroy', $category->id],'method'=>'delete'])}}

                                    {{Form::submit('Delete',['class'=>'btn btn-primary'],['onclick'=>"return confirm('Are you confirm to delete !')"])}}

                                    {{--<input class="btn btn-primary" type="submit" value="Delete" onclick="return confirm('Are you confirm to delete !')">--}}
                                    {{Form::close()}}

                                </td>
                            </tr>
                            <tr>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection