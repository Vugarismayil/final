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
    <div class="blog-page-conent">
        <div class="container">
            <div class="row">
                @foreach($items as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post"><!-- single blog page -->
                        <div class="thumb">
                            <img src="{{ asset('assets/frontend/upload/announcement') }}/{{ $item->image }}" alt="announcement images">
                        </div>
                        <div class="content">
                            <a href="{{ route('announcement.details', $item->id) }}"><h4 class="title">{{ $item->title }}</h4></a>
                            <div class="post-meta">
                                <span class="time"><i class="far fa-clock"></i> {{ $item->created_at->format('d F Y') }}</span>
                            </div>
                            <p>
                                {!! substr($item->description, 0, 150) !!}
                            </p>
                            <a href="{{ route('announcement.details', $item->id) }}" class="readmore"><font color="red">Devamini Oku</font></a>
                        </div>
                    </div><!-- //. single blog page content -->
                </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
