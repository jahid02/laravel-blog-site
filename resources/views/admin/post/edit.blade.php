@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Post</h4>
                <p class="card-category">Edit <b>{{ $post->title }}</b> post here</p>
            </div>
            <div class="card-body">
                {{ Form::model($post,['route'=>['post.update',$post->id],'method'=>'put','files'=>true]) }}
                @include('admin.post._form')
                {{ Form::submit('Update Post',['class'=>'btn btn-primary pull-right']) }}
                <div class="clearfix"></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection