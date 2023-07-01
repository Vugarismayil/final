@extends('admin.layouts.master')
@section('page_icon', 'fa fa-list-ol')
@section('page_name', 'İptal Edilen Siparişler')
@section('body')
    <ul class="orders-ul">
       <li class="text-color"><a class="btn btn-secondary" href="{{ route('admin.order') }}">Tüm Siparişler</a></li>        <li class="text-color"><a class="btn btn-secondary" href="{{ route('admin.pending.order') }}">Bekleyen Siparişler</a></li>        <li class="text-color"><a class="btn btn-secondary" href="{{ route('admin.process.order') }}">İşlemdeki Siparişler</a></li>        <li class="text-color"><a class="btn btn-secondary" href="{{ route('admin.partial.order') }}">Kısmi Siparişler</a></li>        <li class="text-color"><a class="btn btn-secondary" href="{{ route('admin.complete.order') }}">Tamamlanan Siparişler</a></li>        <li class="text-color"><a class="btn btn-secondary" href="{{ route('admin.cancel.order') }}">İptal Edilen Sip.</a></li>        <li class="text-color"><a class="btn btn-secondary" href="{{ route('admin.refund.order') }}">Geri Ödenen Sip.</a></li>
    </ul>
    <div class="tile">
        <h3 class="tile-title">İptal Edilen Siparişler</h3>
        <table class="table table-hover">
            <thead>
            <tr>
               <th>Kullanıcı Adı</th>                <th>Sipariş Id</th>                <th>Servis</th>                <th>Paket</th>                <th>Link</th>                <th>Miktar</th>                <th>Sayacı Başlat</th>                <th>Kalıntılar</th>                <th>Tarih</th>                <th>Detaylar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        <a href="{{ route('admin.user-single', $item->user_id) }}">{{$item->user->username}}</a>
                    </td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->service->name}}</td>
                    <td>
                        <a href="{{$item->link}}">{{$item->link}}</a>
                    </td>
                    <td>
                        {{$item->quantity}}
                    </td>
                    <td>
                        {{$item->start_counter}}
                    </td>
                    <td>
                        {{$item->remains}}
                    </td>
                    <td>
                        {{ $item->created_at->format('d M Y - H:i A') }}
                    </td>
                    <td>
                        <a class="btn btn-outline-info del-order-btn" href="{{ route('admin.order.details', $item->id) }}"><i
                                    class="fa fa-eye"></i></a>
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