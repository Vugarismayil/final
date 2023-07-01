@extends('frontend.layouts.master')
@section('body')
    <div class="header-area header-bg" style="background-image: url({{ asset('assets/frontend/upload/logo/header-bg.png') }});">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <div class="header-inner ">
                        <h1 class="title">{{ $general->banner_heading }}</h1>
                        <p class="wow fadeInDown">{!! $general->banner_des !!}</p>
                        <div class="btn-wrapper">
                            <a href="../register" class="boxed-btn btn-rounded">Hemen Kayıt Ol</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="service-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title extra">
                        <h2 class="title">Hizmet Verdiğimiz Servisler</h2>
                        <p>{!! $general->service_des !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-6 col-md-6">
                    <div class="single-service-item">
                        <div class="icon">
                            <img src="{{ asset('assets/frontend/upload/ourServices') }}/{{ $service->image }}" alt="service icon" style="max-height: 60px; max-width: 50px;">
                        </div>
                        <div class="content">
                            <h4 class="title">{{ $service->title }}</h4>
                            <p>{{ substr($service->description, 0, 300) }}</p>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <section class="video-area video-area-bg grd-overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="video-area-content">
                        <h2 class="title">Hakkımızda {{ $general->title }}</h2>
                      {{ $general->about_us }}
                        <div class="btn-wrapper">
                            <a href="{{ route('contact') }}" class="boxed-btn btn-rounded">Destek Hattı</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-area " id="testimonial_carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content-area">
                        <h3 class="title">Mutlu Müşteri Yorum Bölümü</h3>
                        <p>{!! $general->testimonial_des !!}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content-area">
                        <div class="testimonial-carousel" id="testimonial-carousel">
                            @foreach($testimonials as $testimonial)
                            <div class="single-testimonial-carousel">
                                <div class="author-details">
                                    <div class="pro-immage">
                                        <img src="{{ asset('assets/frontend/upload/testimonial') }}/{{ $testimonial->image }}" alt="testimonial image">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{ $testimonial->name }}</h4>
                                    </div>
                                </div>

                                <div class="description">
                                    <p>{{ $testimonial->description }}</p>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="achivement-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title">Sistem Genel Analizi</h2>
                        <p>{!! $general->achivment_des !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-achivement-item">
                        <div class="number">
                            <span class="num-count">{{ $customers }}</span>
                        </div>
                        <h4 class="title">Kayıtlı Üye</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-achivement-item">
                        <div class="number">
                            <span class="num-count">{{ $subscribers }}</span>
                        </div>
                        <h4 class="title">Aboneler</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-achivement-item">
                        <div class="number">
                            <span class="num-count">{{ $orders }}</span>
                        </div>
                        <h4 class="title">Siparişler</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title extra">
                        <h2 class="title">Sıkça Sorulan Soru ve Cevaplar</h2>
                        <p>{!! $general->faq_des !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($faqs as $key => $faq)
                    @if($key % 2 == 0)
                <div class="col-lg-6">
                    <div class="left-content-wrapper">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <a  data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapseOne">
                                        {{ $faq->title }}
                                    </a>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        {{ $faq->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @else
                <div class="col-lg-6">
                    <div class="right-content-wrapper">
                        <div id="accordion_2">
                            <div class="card">
                                <div class="card-header" id="headingOne_2">
                                    <a  data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapseOne_2">
                                        {{ $faq->title }}
                                    </a>
                                </div>

                                <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="headingOne_2" data-parent="#accordion_2">
                                    <div class="card-body">
                                        {{ $faq->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- //.right content wrappper -->
                </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="marketing-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="marekting-inner">
                        <h2 class="title">Bültene Abone Ol !</h2>
                        <div class="subscribe-form-wapper">
                            <span id="error_subs"></span>
                            <form class="subscribe-form" method="post">
                                @csrf
                                <div class="form-element">
                                    <input type="text" name="email" class="input-field" placeholder="Enter your email...">
                                </div>
                                <input type="submit" class="submit-btn" value="Abone Ol">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection