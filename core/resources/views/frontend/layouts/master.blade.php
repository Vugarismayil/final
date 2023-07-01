<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $general->title }} </title>
    <link rel="shortcut icon" href="{{ asset('assets/frontend/upload/logo/icon.png') }}" type="image/x-icon">
    @include('frontend.layouts.styles')
    <link href="{{ asset('assets/frontend/css/color.php?color=') }}{{ $general->base_color }}" rel="stylesheet">
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                'X-CSRF-Token': "{{csrf_token()}}"
            })
        });
    </script>
</head>

<body>

<nav class="navbar navbar-area navbar-expand-lg navbar-light ">
    <div class="container nav-container">
        <div class="logo-wrapper navbar-brand">
            <a href="{{url('/')}}" class="logo main-logo">
                <img src="{{ asset('assets/frontend/upload/logo/logo.png') }}" class="footer-img-logo" alt="logo">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="mirex">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link pl-0" href="{{ route('home') }}">Anasayfa
                        <span class="sr-only">(şimdiki)</span>
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="../login">Giriş Yap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('api') }}">API</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('announcement') }}">Duyurular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">İletişim</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </li>
                    @endauth
            </ul>
        </div>
        <div class="right-btn-wrapper">
            <a href="{{ route('login') }}" class="boxed-btn btn-rounded">Giriş Yap</a>
        </div>

        <div class="responsive-mobile-menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mirex" aria-controls="mirex"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>
@section('body')
    @show
@include('frontend.layouts.footer')
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="preloader-container">
            <div class="item item-1"></div>
            <div class="item item-2"></div>
            <div class="item item-3"></div>
            <div class="item item-4"></div>
        </div>
    </div>
</div>
<div class="back-to-top">
    <i class="fas fa-rocket"></i>
</div>
@include('frontend.layouts.scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('submit', '.subscribe-form', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('subscribe') }}",
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data == 0){
                        $('.input-field').val('');
                        $('#error_subs').html('')
                        $('#error_subs').append('<p class="alert alert-success text-center"> You are now a subscriber </p>');
                    }

                },
                error: function (res) {
                    var error = res.responseJSON;
                    var errData = error.errors;
                    $('#error_subs').html('');
                    $.each(errData, function (key, value) {
                        $('#error_subs').html('')
                        $('#error_subs').append('<p class="alert alert-danger text-center">' + value + '</p>');
                    });
                }
            })
        });
    });
</script>
</body>
</html>
