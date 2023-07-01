<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $general->title }} | @yield('site_title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    @include('user.layouts.styles')
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
          rel='stylesheet'>
    <link rel="shortcut icon" href="{{ asset('assets/frontend/upload/logo/icon.png') }}"/>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                'X-CSRF-Token': "{{csrf_token()}}"
            })
        });
    </script>
</head>
<body>
<div class="page">
    @include('user.layouts.navbar')
    <div class="page-content d-flex align-items-stretch">
        @include('user.layouts.sidebar')
        <div class="content-inner">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">@yield('page_title')</h2>
                </div>
            </header>
            <section class="dashboard-counts no-padding-bottom">
                <div class="container-fluid">
                    @section('body')
                        @show
                </div>
            </section>
            @include('user.layouts.footer')
        </div>
    </div>
</div>
@include('user.layouts.scripts')
@section('scripts')
@show
</body>
</html>