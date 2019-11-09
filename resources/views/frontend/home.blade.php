@extends('frontend.layouts.master')
@section('content')
    <div class="row">
        <!-- post -->
    @foreach($last2featrueds as $post)

        <div class="col-md-6">
            <div class="post post-thumb">
                <a class="post-img" href="{{route('details', $post->id)}}"><img src="{{asset($post->image)}}" alt=""></a>
                <div class="post-body">
                    <div class="post-meta">
                        <a class="post-category cat-2" href="">{{$post->relCategory->name}}</a>
                        <span class="post-date">{{date('d M Y', strtotime($post->published_date))}}</span>
                    </div>
                    <h3 class="post-title"><a href="{{route('details', $post->id)}}">{{$post->title}}</a></h3>
                </div>
            </div>
        </div>
        @endforeach
        <!-- /post -->

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h2>Recent Posts</h2>
            </div>
        </div>

        @php
            $x=0;
        @endphp
        @foreach($recent_post as $post)
        <!-- post -->
        <div class="col-md-4">
            <div class="post">
                <a class="post-img" href="#"><img src="{{asset($post->image)}}" alt=""></a>
                <div class="post-body">
                    <div class="post-meta">
                        <a class="post-category cat-1" href="#">{{$post->relCategory->name}}</a>
                        <span class="post-date">{{date('d M Y', strtotime($post->published_date))}}</span>
                    </div>
                    <h3 class="post-title"><a href="#">{{$post->title}}</a></h3>
                </div>
            </div>
        </div>
        <!-- /post -->
            @php
            $x++;
            @endphp
            @if ($x==3)
                <div class="clearfix visible-md visible-lg"></div>
            @php
                $x=0;
            @endphp
            @endif
            @endforeach
        <!-- /post -->
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <!-- post -->
                <div class="col-md-12">
                    <div class="post post-thumb">
                        <a class="post-img" href="{{ route('details',$all_posts[0]->id) }}"><img src="{{ $all_posts[0]->image }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="#">{{ $all_posts[0]->relCategory->name }}</a>
                                <span class="post-date">{{ date('d M Y',strtotime($all_posts[0]->published_date)) }}</span>
                            </div>
                            <h3 class="post-title"><a href="{{ route('details',$all_posts[0]->id) }}">{{ $all_posts[0]->title }}</a></h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->
            @php
                $x=0;
            @endphp
            @foreach($all_posts as $key=>$post)
                @if($key!=0)
                    <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{ route('details',$post->id) }}"><img src="{{ asset($post->image) }}" alt=""></a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-1" href="#">{{ $post->relCategory->name }}</a>
                                        <span class="post-date">{{ date('d M Y',strtotime($post->published_date)) }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ route('details',$post->id) }}">{{ $post->title }}</a></h3>
                                </div>
                            </div>
                        </div>

                        @php
                            $x++;
                        @endphp
                        @if($x==2)
                            <div class="clearfix visible-md visible-lg"></div>
                            @php
                                $x=0;
                            @endphp
                        @endif
                    <!-- /post -->
                    @endif
                @endforeach

            </div>
        </div>

        <div class="col-md-4">
            @include('frontend._mostRecentAndFeature')
        </div>
    </div>

    <div class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Featured Posts</h2>
                    </div>
                </div>

                @foreach($last3featrueds as $post)
                    <div class="col-md-4">
                        <div class="post">
                            <a class="post-img" href="{{route('details', $post->id)}}"><img src="{{asset($post->image)}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-3" href="#">{{$post->relCategory->name}}</a>
                                    <span class="post-date">{{date('d M Y', strtotime($post->published_date))}}</span>
                                </div>
                                <h3 class="post-title"><a href="{{route('details', $post->id)}}">{{$post->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Most Read</h2>
                    </div>
                </div>
                <!-- post -->
                @foreach($popular_post as $post)
                <div class="col-md-12">
                    <div class="post post-row">
                        <a class="post-img" href="{{route('details', $post->id)}}"><img src="{{asset($post->image)}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-2" href="#">{{ $post->relCategory->name }}</a>
                                <span class="post-date">{{date('d M Y', strtotime($post->published_date))}}</span>
                            </div>
                            <h3 class="post-title"><a href="{{route('details', $post->id)}}">{{$post->title}}</a></h3>
                            <p>{{$post->short_description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- post -->

                {{--<div class="col-md-12">
                    <div class="section-row">
                        <button class="primary-button center-block">Load More</button>
                    </div>
                </div>--}}
            </div>
        </div>

        <div class="col-md-4">
            <!-- ad -->
            <div class="aside-widget text-center">
                <a href="#" style="display: inline-block;margin: auto;">
                    <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                </a>
            </div>
            <!-- /ad -->

        </div>
    </div>
@endsection

