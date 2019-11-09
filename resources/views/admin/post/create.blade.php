@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Post</h4>
                <p class="card-category">Create new post here</p>
            </div>
            <div class="card-body">
                {{ Form::open(['route'=>'post.store','files'=>true]) }}
                @include('admin.post._form')
                {{ Form::submit('Store Post',['class'=>'btn btn-primary pull-right']) }}
                <div class="clearfix"></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection