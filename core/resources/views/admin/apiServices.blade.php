@extends('admin.layouts.master')
@section('page_icon', 'fa fa-suitcase')
@section('page_name', 'API Servisleri')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">API Servis Listesi</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Adi</th>
                        <th>Kategori</th>
                        <th>Fiyat</th>
                        <th>Min</th>
                        <th>Max</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ isset($item->service->id) ? $item->service->id : $item->service}}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ isset($item->rate) ? $item->rate : $item->price_per_k }} $</td>
                            <td>{{ $item->min }}</td>
                            <td>{{ $item->max }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection