@extends('frontend.layouts.master')
@section('body')
    <section class="breadcrumb-area breadcrumb-bg white-bg"
             style="background-image: url({{ asset('assets/frontend/upload/logo/bread.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="title">Hesabı Doğrula</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="login-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2 class="title">Hesabınızı Doğrulayın</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center margin-top--70">
                <div class="col-lg-5">
                    <div class="tex-center">
                        @if(session()->has('success'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('success') }}
                            </div>
                        @elseif(session()->has('alert'))
                            <div class="alert alert-danger text-center">
                                {{ session()->get('alert') }}
                            </div>
                        @endif
                    </div>
                    <div class="login-form-wrapper">
                        @if(Auth::user()->status == 1)
                            <form action="{{route('user.auth')}}" method="post"
                                  enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="form-element has-icon margin-bottom-20">
                                    <input type="text" class="input-field" name="code" placeholder="Doğrulama Kodu">
                                    <div class="the-icon">
                                        <i class="fa fa-fax"></i>
                                    </div>
                                </div>
                                <div class="btn-wrapper margin-bottom-20">
                                    <div class="left-content">
                                        <input type="submit" class="submit-btn" value="Doğrula">
                                    </div>
                                    <div class="right-content">
                                        <a href="#" class="anchor" onclick="event.preventDefault(); document.getElementById('re-auth').submit();">Kodu Tekrar Gönder</a>
                                    </div>
                                </div>
                            </form>
                            <form action="{{route('user.reauth')}}" method="post" id="re-auth">
                                @csrf
                            </form>
                        @else
                            <h2 class="text-center" style="color: #c0392b">Hesabınız devre dışı bırakıldı.</h2>
                            <h4 class="text-center">Yönetici ile iletişime geçin.</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection