@extends('user.layouts.master')
@section('site_title', 'Destek Hattı')
@section('page_title')
    <i class="fa fa-life-ring"></i> Destek
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            @include('user.layouts.flash')
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="admin-header-text">
                                Destek Biletlerim
                            </div>
                        </div>
                        <div class="col-md-6"> <span class="pull-right"> <div
                                        class="admin-header-button support-btn">
                        <a href="{{ route('user.ticket.open') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Yeni Destek Bileti Aç</a>
                    </div> </span></div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tarih</th>
                            <th>Bilet Numarası</th>
                            <th>Konu</th>
                            <th>Durum</th>
                            <th>Detaylar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($supports as $key => $support)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $support->created_at->format('d F, Y h:i A') }}</td>
                                <td>#{{ $support->ticket }}</td>
                                <td>{{ $support->subject }}</td>
                                <td>
                                    @if($support->status == 0 || $support->status == 2)
                                        <b class="btn badge-info"><i
                                                    class="fa fa-eye"></i> Açık</b>
                                    @elseif($support->status == 1)
                                        <b class="btn badge-success"><i
                                                    class="fa fa-check"></i> Yanıtlanan</b>
                                    @elseif($support->status == 4)
                                        <b class="btn badge-danger"><i class="fa fa-times"></i> Kapalı</b>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.message', $support->ticket) }}" class="btn btn-info"><i
                                                class="fa fa-eye"></i> Görüntüle</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $supports->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection