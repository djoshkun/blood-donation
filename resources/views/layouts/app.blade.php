<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Blood Donation</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset("src/images/favicon-16x16.png")}}" >
        <link href="{{asset("src/slick/slick.css")}}" rel="stylesheet">
        <link href="{{asset("src/scss/style.css")}}" rel="stylesheet">
        <link href="{{asset("src/scss/fontawesome/css/all.min.css")}}" rel="stylesheet">
    </head>
    <body>
        <div class="big-wrapper">
            <div class="sticky-header">
                <div class="sticky-header__container">
                    <a href="{{route('index')}}" class="sticky-header__container__logo">
                        <img src="{{asset("src/images/ttt.png")}}">
                    </a>
                    @if(!$__env->yieldContent('nav'))
                    @include('partials/nav_header')
                    @endif
                    @yield('nav')
                </div>
                @include('partials/success_message')
            </div>
            @yield('body')
        </div>
        @include('partials/footer')
        <script type="text/javascript" src="{{asset("src/js/jquery-3.3.1.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("src/slick/slick.min.js")}}"></script>
        <script type="text/javascript" src="{{asset("src/js/main.js")}}"></script>
        @yield('js')
    </body>
</html>