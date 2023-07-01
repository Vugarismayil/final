@extends('user.layouts.master')
@section('site_title', 'Anasayfa')
@section('page_title')
    <i class="fa fa-home"></i> Anasayfa - PaneLim
@endsection
@section('body')
    <div class="row">
             <div class="statistics col-md-3">
                <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="fa fa-money"></i></div>
                    <div class="text"><strong>{{ round($fund->balance, 2) }} {{ $general->currency_symbol }}</strong><br><small>Bakiye</small></div>
                </div>
            </div>
            <div class="statistics col-md-3">
                <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-red"><i class="fa fa-money"></i></div>
                    <div class="text"><strong>{{ round($spent, 2) }} {{ $general->currency_symbol }}</strong><br><small>Toplam Harcama</small></div>
                </div>
            </div>
        <div class="statistics col-md-3">
            <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-orange"><i class="fa fa-spinner"></i></div>
                <div class="text"><strong>{{ $pending }}</strong><br><small>Bekleyen Siparişler</small></div>
            </div>
        </div>
        <div class="statistics col-md-3">
            <div class="statistic d-flex align-items-center bg-white has-shadow">
                <div class="icon bg-blue"><i class="fa fa-refresh"></i></div>
                <div class="text"><strong>{{ $processing }}</strong><br><small>İşlemdeki Siparişler</small></div>
            </div>
        </div>
    </div>
    <section class="dashboard-header">
            <div class="row">
                <div class="statistics col-md-4">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-violet"><i class="fa fa-check"></i></div>
                        <div class="text"><strong>{{ $complete }} </strong><br><small>Tamamlanan Siparişler</small></div>
                    </div>
                </div>
                <div class="statistics col-md-4">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-red"><i class="fa fa-times"></i></div>
                        <div class="text"><strong>{{ $cancel }}</strong><br><small>İptal Edilen Siparişler</small></div>
                    </div>
                </div>
                <div class="statistics col-md-4">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-dark"><i class="fa fa-exchange"></i></div>
                        <div class="text"><strong>{{ $refund }}</strong><br><small>Geri Ödenenler</small></div>
                    </div>
                </div>
            </div>
    </section>

@endsection