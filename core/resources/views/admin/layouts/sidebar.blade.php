<aside class="app-sidebar">
    <ul class="app-menu">
        <li><a class="app-menu__item @if(request()->path() == 'admin/dashboard') active @endif"
               href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span
                        class="app-menu__label">Panelim</span></a></li>
        <li><a class="app-menu__item @if(request()->path() == 'admin/category') active @endif"
               href="{{ route('admin.category') }}"><i class="app-menu__icon fa fa-list-alt"></i><span
                        class="app-menu__label">Kategoriler</span></a></li>
        <li><a class="app-menu__item @if(request()->path() == 'admin/service') active @endif"
               href="{{ route('admin.service') }}"><i class="app-menu__icon fa fa-suitcase"></i><span
                        class="app-menu__label">Servisler</span></a></li>
        <li><a class="app-menu__item @if(request()->path() == 'admin/orders') active @endif"
               href="{{ route('admin.order') }}"><i class="app-menu__icon fa fa-list-ol"></i><span
                        class="app-menu__label">Siparişler</span></a></li>
        <li><a class="app-menu__item @if(request()->path() == 'admin/gatewayList') active @endif"
               href="{{ route('gateway.lists') }}"><i class="app-menu__icon fa fa-credit-card"></i><span
                        class="app-menu__label">Ödeme Yöntemi</span></a></li>
        <li><a class="app-menu__item @if(request()->path() == 'admin/apiSettings') active @endif"
               href="{{ route('api.settings') }}"><i class="app-menu__icon fa fa-cogs"></i><span
                        class="app-menu__label">Api Ayarları</span></a></li>
        <li class="treeview
@if(request()->path() == 'admin/users') is-expanded
@elseif(request()->path() == 'admin/user-banned') is-expanded
@elseif(request()->path() == 'admin/broadcast') is-expanded
@elseif(request()->path() == 'admin/subscibers') is-expanded
@elseif(request()->path() == 'admin/transactionLogs') is-expanded
@elseif(request()->path() == 'admin/depositLogs') is-expanded
@endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span
                        class="app-menu__label">Üye Yönetimi</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/users') active @endif"
                       href="{{ route('admin.users') }}"><i class="icon fa fa-circle-o"></i> Üyeler</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/user-banned') active @endif"
                       href="{{ route('admin.user-ban') }}"><i class="icon fa fa-circle-o"></i> Banlı Üyeler</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/broadcast') active @endif"
                       href="{{ route('admin.broadcast') }}"><i class="icon fa fa-circle-o"></i> Posta Yayını</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/subscribers') active @endif"
                       href="{{ route('admin.subscibers') }}"><i class="icon fa fa-circle-o"></i> Aboneler</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/transactionLogs') active @endif"
                       href="{{ route('admin.transaction') }}"><i class="icon fa fa-circle-o"></i> İşlem Kayıtları</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/depositLogs') active @endif"
                       href="{{ route('admin.deposit.logs') }}"><i class="icon fa fa-circle-o"></i> Mevduat Kayıtları</a>
                </li>
            </ul>
        </li>
        <li class="treeview
@if(request()->path() == 'admin/supportTickets') is-expanded
@elseif(request()->path() == 'admin/pendingSupportTickets') is-expanded
@endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-ticket"></i><span
                        class="app-menu__label">Destek Bileti</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/supportTickets') active @endif"
                       href="{{ route('admin.ticket') }}"><i class="icon fa fa-circle-o"></i> Destek Biletleri</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/pendingSupportTickets') active @endif"
                       href="{{ route('admin.pending.ticket') }}"><i class="icon fa fa-circle-o"></i> Bekleyen Biletler</a>
                </li>
            </ul>
        </li>
        <li class="treeview
@if(request()->path() == 'admin/generalSetting') is-expanded
@elseif(request()->path() == 'admin/emailSetting') is-expanded
@endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span
                        class="app-menu__label">Website Kontrolü</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/generalSetting') active @endif"
                       href="{{ route('admin.GenSetting') }}"><i class="icon fa fa-circle-o"></i> Genel Ayarlar</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/emailSetting') active @endif"
                       href="{{ route('admin.EmailSetting') }}"><i class="icon fa fa-circle-o"></i> E-posta Şablonu</a>
                </li>
            </ul>
        </li>
        <li class="treeview
@if(request()->path() == 'admin/logoFaviconSettings') is-expanded
@elseif(request()->path() == 'admin/socialSettings') is-expanded
@elseif(request()->path() == 'admin/ourServices') is-expanded
@elseif(request()->path() == 'admin/testimonial') is-expanded
@elseif(request()->path() == 'admin/faq') is-expanded
@elseif(request()->path() == 'admin/announcements') is-expanded
@elseif(request()->path() == 'admin/frontendSetting') is-expanded
@endif"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-desktop"></i><span
                        class="app-menu__label">Kontrol Arayüzü</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->path() == 'admin/logoFaviconSettings') active @endif"
                       href="{{ route('logoicon') }}"><i class="icon fa fa-circle-o"></i> Logo Ayarları</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/socialSettings') active @endif"
                       href="{{ route('social') }}"><i class="icon fa fa-circle-o"></i> Sosyal Icon Ayarları</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/ourServices') active @endif"
                       href="{{ route('admin.ourServices') }}"><i class="icon fa fa-circle-o"></i> Hizmet Ayarları</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/testimonial') active @endif"
                       href="{{ route('admin.testimonial') }}"><i class="icon fa fa-circle-o"></i> Yorum Ayarları</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/faq') active @endif"
                       href="{{ route('admin.faq') }}"><i class="icon fa fa-circle-o"></i> S.S.S Ayarları</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/announcements') active @endif"
                       href="{{ route('admin.announcements') }}"><i class="icon fa fa-circle-o"></i> Duyuru Ayarları</a>
                </li>
                <li><a class="treeview-item @if(request()->path() == 'admin/frontendSetting') active @endif"
                       href="{{ route('admin.frontend') }}"><i class="icon fa fa-circle-o"></i> Önsayfa Ayarları</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>