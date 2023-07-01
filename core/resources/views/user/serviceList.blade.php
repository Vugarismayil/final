@extends('user.layouts.master')
@section('site_title', 'Servis Listesi')
@section('page_title')
    <i class="fa fa-list-ol"></i> Servis Listesi
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            @foreach($categories as $category)
            <div class="card">
                <div class="card-header bg-dark text-white">{{ $category->category->name }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Servis</th>
                                <th>1K - Başına Fiyat</th>
                                <th>Min</th>
                                <th>Max</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $items = \App\ServicePrice::where('category_id', $category->category_id)->where('user_id', Auth::id())->get();
                            @endphp
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->service_id }}</td>
                                    <td>{{ $item->service->name }}</td>
                                    <td>{{ $item->price }} {{ $general->currency_symbol }}</td>
                                    <td>{{ $item->service->min }}</td>
                                    <td>{{ $item->service->max }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
@endsection