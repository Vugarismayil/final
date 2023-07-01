@extends('frontend.layouts.master')
@section('body')
    <section class="breadcrumb-area breadcrumb-bg white-bg" style="background-image: url({{ asset('assets/frontend/upload/logo/bread.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="title">Kaydol</h1>
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
                        <h2 class="title">Ücretsiz Hesap Oluştur</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center margin-top--70">
                <div class="col-lg-8">
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
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-element has-icon margin-bottom-20">
                                        <input type="text" name="name" class="input-field {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Adınız">
                                        <div class="the-icon">
                                            <i class="far fa-user"></i>
                                        </div>
                                        @if ($errors->has('name'))
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-element has-icon margin-bottom-20">
                                        <input type="email" name="email" class="input-field {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="E-Posta">
                                        <div class="the-icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        @if ($errors->has('email'))
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                    <div class="form-element has-icon margin-bottom-20">
                                        <input type="password" name="password" class="input-field" placeholder="Şifreniz">
                                        <div class="the-icon">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-element has-icon margin-bottom-20">
                                        <input type="text" name="username" class="input-field" value="{{ old('username') }}" placeholder="Kullanıcı Adı">
                                        <div class="the-icon">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        @if ($errors->has('username'))
                                            <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                        @endif
                                    </div>
                                    <div class="form-element has-icon margin-bottom-20">
                                        <input type="password" name="password_confirmation" class="input-field" placeholder="Şifre Onayla">
                                        <div class="the-icon">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        @if ($errors->has('password'))
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkbox-area margin-bottom-20">
                                        <div class="checkbox-element">
                                            <div class="checkbox-wrapper">
                                                <label class="checkbox-inner">Kullanıcı Sözleşmesini Kabul Ediyorum..
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper">
                                        <div class="left-content">
                                            <input type="submit" class="submit-btn" value="Kayıt Ol">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

