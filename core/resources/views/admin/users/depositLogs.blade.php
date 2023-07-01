@extends('admin.layouts.master')
@section('page_icon', 'fa fa-credit-card')
@section('page_name', 'Mevduat Kayıtları')
@section('body')
    <div class="tile">
        <h3 class="tile-title">Mevduat Kayıtları</h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>
                    Kullanıcı Adı
                </th>
                <th>
                   Ödeme Şekli
                </th>
                <th>
                    Miktar
                </th>
                <th>
                    Kullanıcı Bakiyesi
                </th>
                <th>
                    Trx Kimliği
                </th>
                <th>
                    Tarih
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        {{$item->user->username}}
                    </td>
                    <td>{{$item->gateway->username}}</td>
                    <td>
                        {{$item->amount}} $
                    </td>
                    <td>
                        {{$item->user_balance}} $
                    </td>
                    <td>
                        {{$item->trx}}
                    </td>
                    <td>
                        {{ $item->created_at->format('d M Y - H:i') }}
                    </td>
                </tr>
            @endforeach
            <tbody>
        </table>
        {{$items->links()}}
    </div>
@endsection