<header class="header">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand --><a href="{{ route('home') }}" class="navbar-brand d-none d-sm-inline-block">
                        <div class="brand-text d-none d-lg-inline-block">
                           <img src="{{ asset('assets\frontend\upload\logo\logo.png') }}" style="max-width: 200px; max-height: 45px"></div>
                        <div class="brand-text d-none d-sm-inline-block d-lg-none"></div>
                    </a>
                    <!-- Toggle Button--><a id="toggle-btn" href="#"
                                            class="menu-btn active"><span></span><span></span><span></span></a>
                </div>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <li class="nav-item d-flex align-items-center"> <span class="bal-info">Bakiye : {{ round(Auth::user()->balance, 2)}} {{ $general->currency_symbol }} </span> </li>
                   
				   <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#"
                                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                     class="nav-link language dropdown-toggle"><img class="profile-image"
                                    src="{{ asset('assets/frontend/upload/profile') }}/{{ Auth::user()->image != null ? Auth::user()->image : 'default.jpg'}}" alt="profile image"><span class="d-none d-sm-inline-block">{{ Auth::user()->username }}</span></a>
                        <ul aria-labelledby="languages" class="dropdown-menu">
                            
							<li><a rel="nofollow" href="../user/myProfile" class="dropdown-item"><i class="fa fa-user"></i> Hesabım</a>
                            </li>
							
							<li><a rel="nofollow" href="{{ route('change.password') }}" class="dropdown-item"><i class="fa fa-unlock-alt"></i> Şifre Değiştir</a>
                            </li>
							
                            <li><a rel="nofollow" href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Çıkış Yap</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>