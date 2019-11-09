 @extends('frontend.layouts.master')
 @section('content')
     <!-- Page Header -->
     <div id="post-header" class="page-header">
         <div class="background-img" style="background-image: url({{asset($post->image)}});"></div>
         <div class="container">
             <div class="row">
                 <div class="col-md-10">
                     <div class="post-meta">
                         <a class="post-category cat-2" href="#">{{$post->relCategory->name}}</a>
                         <span class="post-date">{{date('d M Y', strtotime($post->published_date))}}</span>
                         <br>
                         <span class="post-date">Author : {{$post->relAuthor->name}}</span>
                     </div>
                     <h1>{{$post->title}}</h1>
                 </div>
             </div>
         </div>
     </div>
     <!-- /Page Header -->
     <div class="row">
         <!-- Post content -->
         <div class="col-md-8">
             <div class="section-row sticky-container" style="padding-top: 62px;">
                 <div class="main-post">
                     <p class="text-justify">{{$post->description}}</p>
                 </div>

             </div>




         </div>
         <!-- /Post content -->

         <!-- aside -->
         <div class="col-md-4" style="padding-top: 63px;">

             @include('frontend._mostRecentAndFeature')

         </div>
         <!-- /aside -->
     </div>
 @endsection
