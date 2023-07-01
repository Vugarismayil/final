@extends('frontend.layouts.master')
@section('body')
    <section class="breadcrumb-area breadcrumb-bg white-bg" style="background-image: url({{ asset('assets/frontend/upload/logo/bread.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="title">Duyurular</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="blog-details-page-conent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 single-blog-details-inner-wrapper">
                    <div class="single-blog-details-post">
                        <div class="thumb">
                            <img src="{{ asset('assets/frontend/upload/announcement') }}/{{ $item->image }}" alt="blog images">
                        </div>
                        <div class="content">
                            <h4 class="title">{{ $item->title }}</h4>
                            <div class="post-meta">
                                <span class="time"><i class="far fa-clock"></i> {{ $item->created_at->format('d F Y') }}</span>
                            </div>
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
