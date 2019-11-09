
<!DOCTYPE html>
<html lang="en">
<head>
   @include('frontend.layouts._header')
</head>
<body>

<!-- Header -->
<header id="header">
    <!-- Nav -->
    <div id="nav">
        @include('frontend.layouts._nav')
    </div>
    <!-- /Nav -->
</header>
<!-- /Header -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        @yield('content')
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->


<!-- Footer -->
<footer id="footer">
    <!-- container -->
    {{--@include('frontend.layouts._footer')--}}
    <!-- /container -->
</footer>
<!-- /Footer -->

<!-- jQuery Plugins -->

<script src="{{asset('assets/frontend/js/main.js')}}"></script>


</body>
</html>
