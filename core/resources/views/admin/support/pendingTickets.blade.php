@extends('admin.layouts.master')
@section('page_icon', 'fa fa-ticket')
@section('page_name', 'Bekleyen Destek Bileti')
@section('body')
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Bekleyen Destek Biletleri</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Kullanıcı Adı</th>
                        <th>Bilet</th>
                        <th>Konu</th>
                        <th>Departman</th>
                        <th>Durum</th>
                        <th>Tarih</th>
                        <th>Detaylar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->ticket }} </td>
                            <td>{{ $item->subject }} </td>
                            <td>{{ $item->department }} </td>
                            <td>
                                @if($item->status == 0)
                                    <p class="btn btn-info">Yeni Bilet</p>
                                @elseif($item->status == 2)
                                    <p class="btn btn-success">Müşteri Cevapladı</p>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d F, Y H:i A') }}</td>
                            <td>
                                <a href="{{ route('admin.ticket.reply', $item->id) }}" class="btn btn-outline-info"><i
                                            class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection