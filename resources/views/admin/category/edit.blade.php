@extends('admin.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Category</h4>
                <p class="card-category">Edit {{$category->name}} Cetegory Here</p>
            </div>
            <div class="card-body">
                {{Form::model($category,['route'=>['category.update', $category->id],'method'=>'put'])}}
                    <div class="row">
                        @include('admin.category._form')
                        {{Form::submit('Update Category',['class'=>'btn btn-primary pull-right'])}}

                        {{--
                                                <button type="submit" class="btn btn-primary pull-right">Update Category</button>
                        --}}
                        <div class="clearfix"></div>
                        {{Form::close()}}
            </div>
        </div>
    </div>
@endsection