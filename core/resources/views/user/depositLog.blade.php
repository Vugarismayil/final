@extends('user.layouts.master')
@section('site_title', 'Bakiye Log')
@section('page_title')
    <i class="fa fa-bars"></i> Bakiye Log
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
                            <th scope="col">Ödeme Yöntemi</th>
                            <th scope="col">Miktar</th>
                            <th scope="col">Saat</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $k=>$item)
                            <tr>
                                <td data-label="SL">{{++$k}}</td>
                                <td data-label="#Trx">{{$item->trx or 'N/A'}}</td>
                                <td data-label="Details">{{ $item->gateway->name  or 'N/A' }}</td>
                                <td data-label="Amount">{{ $item->amount  or 'N/A' }} {{ $general->currency_symbol }}</td>
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