@extends('frontend.layouts.master')
@section('body')
    <section class="breadcrumb-area breadcrumb-bg white-bg" style="background-image: url({{ asset('assets/frontend/upload/logo/bread.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="title">Giriş Yap</h1>
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
                        <h2 class="title">Hesabınıza Giriş Yapın</h2>
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
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-element has-icon margin-bottom-20">
                                <input type="text" name="username" class="input-field {{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" placeholder="Kullanıcı Adı">
                                <div class="the-icon">
                                    <i class="far fa-user"></i>
                                </div>
                                @if ($errors->has('username'))
                                    <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                @endif
                            </div>
                            <div class="form-element has-icon margin-bottom-20">
                                <input type="password" name="password" class="input-field {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Şifreniz">
                                <div class="the-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                            <div class="checkbox-area margin-bottom-20">
                                <div class="checkbox-element">
                                    <div class="checkbox-wrapper">
                                        <label class="checkbox-inner">Beni Hatırla
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrapper margin-bottom-20">
                                <div class="left-content">
                                    <input type="submit" class="submit-btn" value="Giriş Yap">
                                </div>
                                <div class="right-content">
                                    <a href="{{ route('password.request') }}" class="anchor">Şifre Yenile ?</a>
                                </div>
                            </div>
                            <div class="from-footer">
                                <span class="ftext">Hesabınız Yok Mu ?  <a href="{{ route('register') }}">Hemen Kaydol !</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
