@extends('user.layouts.master')
@section('site_title', 'Bakiye Görüntüle')
@section('page_title')
    <i class="fa fa-desktop"></i> Bakiye Görüntüle
@endsection
@section('body')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="panel-title-padding text-center" style="padding-top: 10px;"><i class="fa fa-desktop"></i>
                        BAKIYE GORUNTULE</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Miktar : <strong>{{ $amo }}</strong> {{ $general->currency_symbol }}</li>
                        <li class="list-group-item">Yüklenen : <strong>{{ round($charge, 2) }}</strong> {{ $general->currency_symbol }}</li>
                        <li class="list-group-item">Ödeme Yöntemi : <strong>{{$getway->name}}</strong></li>
                        <li class="list-group-item">Ödenecek Toplam : <strong>{{ round($amo+$charge, 2)}}</strong> {{ $general->currency_symbol }}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('user.depositConfirm') }}">
                        Ödeme Yap
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection