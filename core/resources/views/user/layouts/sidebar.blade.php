<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('assets/frontend/upload/profile') }}/{{ Auth::user()->image != null ? Auth::user()->image : 'default.jpg'}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::user()->name }}</h1>
            <a href="{{ route('my.profile') }}">Hesabım</a>
        </div>
    </div>
    <ul class="list-unstyled">
        <li class="{{ request()->path() == 'user/dashboard' ? 'active' : '' }}"><a href="{{ route('user.home') }}"> <i class="icon-home"></i>Panelim </a></li>
        <li class="{{ request()->path() == 'user/serviceList' ? 'active' : '' }}"><a href="{{ route('user.servicelist') }}"> <i class="fa fa-list-ol"></i>Servis Listesi </a></li>
        <li class="{{ request()->path() == 'user/newOrder' ? 'active' : '' }}"><a href="{{ route('new.order') }}"> <i class="icon-bill"></i>Yeni Şipariş </a></li>
        <li class="{{ request()->path() == 'user/massOrder' ? 'active' : '' }}"><a href="{{ route('mass.order') }}"> <i class="fa fa-shopping-cart"></i>Toplu Sipariş </a></li>
        <li class="{{ request()->path() == 'user/orderHistory' ? 'active' : '' }}"><a href="{{ route('order.history') }}"> <i class="icon-padnote"></i>Sipariş Geçmişi</a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Bakiye Yükle </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled
            @if(request()->path() == 'user/deposit') show
            @elseif(request()->path() == 'user/depositLog') show
            @endif
            ">
                <li class="{{ request()->path() == 'user/deposit' ? 'active' : '' }}"><a href="{{ route('user.deposit') }}">Bakiye</a></li>
                <li class="{{ request()->path() == 'user/depositLog' ? 'active' : '' }}"><a href="{{ route('user.depositLog') }}">Bakiye Log</a></li>
            </ul>
        </li>
        <li class="{{ request()->path() == 'user/transactionLog' ? 'active' : '' }}"><a href="{{ route('user.transactionLog') }}"> <i class="fa fa-bars"></i>İşlem Log</a></li>
        <li class="{{ request()->path() == 'user/supportTicket' ? 'active' : '' }}"><a href="{{ route('user.ticket') }}"> <i class="fa fa-life-ring"></i>Destek</a></li>
        <li class="{{ request()->path() == 'user/apiDocumentation' ? 'active' : '' }}"><a href="{{ route('api.doc') }}"> <i class="fa fa-globe"></i>API</a></li>
    </ul>
</nav>