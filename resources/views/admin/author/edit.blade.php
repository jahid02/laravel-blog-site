@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Author</h4>
                <p class="card-category">Edit {{ $author->name }} Author here</p>
            </div>
            <div class="card-body">
                @include('admin.layouts._error_messages')
                {{ Form::model($author,['route'=>['author.update',$author->id],'method' => 'put']) }}
                @include('admin.author._form')
                {{ Form::submit('Update Author',['class'=>'btn btn-primary pull-right']) }}
                <div class="clearfix"></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection