@extends('frontend.layouts.master')
@section('body')
    <section class="breadcrumb-area breadcrumb-bg white-bg" style="background-image: url({{ asset('assets/frontend/upload/logo/bread.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner"><!-- breadcrumb inner -->
                        <h1 class="title">İletişim</h1>
                    </div><!-- //.breadcrumb inner -->
                </div>
            </div>
        </div>
    </section>
    <section class="contact-page-area">
        <div class="container contact-page-container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @include('frontend.layouts.flash')
                    <div class="section-title">
                        <h2 class="title">Destek Servisi</h2>
                        <p>{{ $general->contact_des }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-page-inner">
                        <form action="{{ route('contact.mail') }}" method="post" id="get_in_touch" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-element margin-bottom-30">
                                        <label for="name" class="label">Adınız *</label>
                                        <input type="text" id="name" class="input-field" placeholder="Enter your name" required>
                                    </div>
                                    <div class="form-element margin-bottom-30">
                                        <label for="phone" class="label">Telefon *</label>
                                        <input type="text" id="phone" class="input-field" placeholder="Enter phone number" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-element margin-bottom-30">
                                        <label for="email" class="label">E-Pposta *</label>
                                        <input type="email" id="email" class="input-field" placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-element margin-bottom-30">
                                        <label for="subject" class="label">Konu *</label>
                                        <input type="text" id="subject" class="input-field" placeholder="Enter your subject" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-element textarea margin-bottom-30">
                                        <label for="message" class="label">Mesajınız *</label>
                                        <textarea id="message" placeholder="Enter message" class="input-field textarea" cols="30" rows="10" required></textarea>
                                    </div>
                                    <input type="submit" class="submit-btn" value="Gönder">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
