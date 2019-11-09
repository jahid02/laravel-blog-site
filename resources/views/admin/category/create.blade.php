@extends('admin.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Category</h4>
                <p class="card-category">Create New Category Here</p>
            </div>
            <div class="card-body">
                {{Form::open(['route'=>'category.store'])}}
                {{--<form method="post" action="{{route('category.store')}}">
                    @csrf--}}
                    <div class="row">
                        @include('admin.category._form')
                        {{Form::submit('Store Category',['class'=>'btn btn-primary pull-right'])}}
                    {{--<button type="submit" class="btn btn-primary pull-right">Save Category</button>--}}
                    <div class="clearfix"></div>
                {{--</form>--}}
                        {{Form::close()}}
            </div>
        </div>
    </div>
@endsection