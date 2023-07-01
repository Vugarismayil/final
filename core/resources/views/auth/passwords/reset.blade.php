@extends('frontend.layouts.master')
@section('body')
    <section class="breadcrumb-area breadcrumb-bg white-bg"
             style="background-image: url({{ asset('assets/frontend/upload/logo/bread.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h1 class="title">Şifrenizi Sıfırlayın</h1>
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
                        <h2 class="title">Şifre Yenileme</h2>
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
                        <form action="{{ route('reset.pass') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{$reset->token}}" name="token"/>
                            <div class="form-element has-icon margin-bottom-20">
                                <input type="password" name="password"
                                       class="input-field {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       placeholder="Şifre">
                                <div class="the-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-element has-icon margin-bottom-20">
                                <input type="password" name="password_confirmation"
                                       class="input-field {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       placeholder="Şifre Onayla">
                                <div class="the-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                            <div class="btn-wrapper margin-bottom-20">
                                <div class="left-content">
                                    <input type="submit" class="submit-btn" value="Şifre Sıfırla">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection