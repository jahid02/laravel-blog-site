@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8 ml-auto mr-auto">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">
                    {{ $post->relCategory->name }}
                </h4>
                <p class="card-category">{{ $post->title }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive table-upgrade">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Author Name</td>
                            <td class="text-center">
                                {{ $post->relAuthor->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Is Featured</td>
                            <td class="text-center">{{ $post->is_featured }}</td>
                        </tr>
                        <tr>
                            <td>Total Hit</td>
                            <td class="text-center">{{ $post->total_hit }}</td>
                        </tr>
                        <tr>
                            <td>Published Date</td>
                            <td class="text-center">{{ $post->published_date }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td class="text-center">{{ $post->status }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <img src="{{ asset($post->image) }}" width="100%">
                <p>
                    {{ $post->description }}
                </p>
            </div>
            <div class="card-footer">
                <a class="btn btn-info" href="{{ route('post.index') }}">Back</a>
            </div>
        </div>
    </div>
@endsection