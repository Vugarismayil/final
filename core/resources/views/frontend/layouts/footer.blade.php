<section class="footer-area blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="footer-widget about"><!-- footer widget -->
                    <div class="widget-body">
                        <a href="index.html" class="footer-logo">
                            <img class="footer-img-logo" src="{{ asset('assets/frontend/upload/logo/logo.png') }}" alt="footer logo">
                        </a>
                        <p>{!! $general->footer_text !!}</p>
                        <ul class="social-icons">
                            @foreach($icons as $icon)
                            <li class="icon-hover"><a href="{{ $icon->link }}"><i class="fab {{ $icon->icon }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- //.footer widget -->
            </div>
            <div class="col-lg-2">
                <div class="footer-widget"><!-- footer widget -->
                    <div class="widget-title">
                        <h4 class="title">Linkler</h4>
                    </div>
                    <div class="widget-body">
                        <ul>
                            <li><a href="{{ route('home') }}">Anasayfa</a></li>
                            <li><a href="{{ route('login') }}">Giriş</a></li>
                            <li><a href="{{ route('register') }}">Kayıt</a></li>
                            <li><a href="{{ route('password.request') }}">Şifre sıfırla</a></li>
                        </ul>
                    </div>
                </div><!-- //.footer widget -->
            </div>
            <div class="col-lg-2">
                <div class="footer-widget"><!-- footer widget -->
                    <div class="widget-title">
                        <h4 class="title">Hakkımızda</h4>
                    </div>
                    <div class="widget-body">
                        <ul>
                            <li><a href="{{ route('api') }}">API</a></li>
                            <li><a href="{{ route('announcement') }}">Duyurular</a></li>
                            <li><a href="{{ route('contact') }}">İletişim</a></li>
                        </ul>
                    </div>
                </div><!-- //.footer widget -->
            </div>
            <div class="col-lg-3">
                <div class="footer-widget contact"><!-- footer widget -->
                    <div class="widget-title">
                        <h4 class="title">İletişim</h4>
                    </div>
                    <div class="widget-body">
                        <span class="details">{!!  $general->contact_address !!}</span>
                        <span class="details">{{ $general->contact_email }}</span>
                        <span class="details">{{ $general->contact_phone }}</span>
                    </div>
                </div><!-- //.footer widget -->
            </div>
        </div>
    </div>
</section>
<div class="copyright-area dark-blug-lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <span class="copytext">{{ $general->footer_heading }}</span>
            </div>
        </div>
    </div>
</div>