@extends('user.layouts.master')
@section('site_title', 'İşlem Logları')
@section('page_title')
    <i class="fa fa-bars"></i> İşlem Logları
@endsection
@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Trx ID</th>
                            <th scope="col">Miktar</th>
                            <th scope="col">Bakiye</th>
                            <th scope="col">İşlem</th>
                            <th scope="col">Tarih/Saat</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $k=>$item)
                            <tr>
                                <td data-label="SL">{{++$k}}</td>
                                <td data-label="#Trx">{{$item->trx or 'N/A'}}</td>
                                <td data-label="Amount">{{ $item->amount  or '0' }} {{ $general->currency_symbol }}</td>
                                <td data-label="Amount">{{ $item->user_balance  or '0' }} {{ $general->currency_symbol }}</td>
                                <td data-label="Amount">
                                    @if($item->type == 0)
                                        <b style="color: #0d638f">Bakiye</b>
                                    @elseif($item->type == 1)
                                        <b style="color: #0a8f3c">Sipariş Oluşturuldu</b>
                                    @elseif($item->type == 2)
                                        <b style="color: #8f2331">Geri Ödendi</b>
                                    @endif
                                </td>
                                <td data-label="Time">{{ $item->created_at->format('d M Y - H:i A') }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection