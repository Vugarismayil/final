@extends('admin.layouts.master')
@section('page_icon', 'fa fa-money')
@section('page_name', 'İşlem Kayıtları')
@section('body')
    <div class="tile">
        <h3 class="tile-title">İşlem Kayıtları</h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Kullanıcı Adı</th>
                <th>Miktar</th>
                <th>Kullanıcı Bakiyesi</th>
                <th>Trx kimliği	</th>
                <th>Amaç</th>
                <th>Tarih</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        {{$item->user->username}}
                    </td>
                    <td>
                        {{$item->amount}} {{ $general->currency_symbol }}
                    </td>
                    <td>
                        {{$item->user_balance}} {{ $general->currency_symbol }}
                    </td>
                    <td>
                        {{$item->trx}}
                    </td>
                   <td>
                       @if($item->type == 0)
                           <b style="color: #0d638f">Depozito</b>
                       @elseif($item->type == 1)
                           <b style="color: #0a8f3c">Sipariş Oluştur</b>
                       @elseif($item->type == 2)
                           <b style="color: #8f2331">Geri Ödendi</b>
                       @endif
                   </td>
                    <td>
                        {{ $item->created_at->format('d M Y - H:i') }}
                    </td>
                </tr>
            @endforeach
            <tbody>
        </table>
        <div class="d-flex justify-content-center">
        {{$items->links()}}
        </div>
    </div>
@endsection