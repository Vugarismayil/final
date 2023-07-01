@extends('user.layouts.master')
@section('site_title', 'Sipariş Geçmişi')
@section('page_title')
    <i class="icon-padnote"></i> Sipariş Geçmişi
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Servis</th>
                                <th>Link</th>
                                <th>Miktar</th>
                                <th>Araç</th>
                                <th>Başlangıç</th>
                                <th>Bitiş</th>
                                <th>Tarih</th>
                                <th>Durum</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->service->name }}</td>
                                    <td><a href="{{ $item->link }}">{{ $item->link }}</a></td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->order_through }}</td>
                                    <td>{{ $item->start_counter }}</td>
                                    <td>{{ $item->remains }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection