@extends('admin.layouts.master')
@section('page_icon', 'fa fa-money')
@section('page_name', 'Servis Ücretleri')
@section('body')
    <div class="tile">
        @include('admin.layouts.flash')
        <h3 class="tile-title">Servis Fiyat Detayları</h3>
        <form method="post" action="{{ route('store.service.price', $user_id) }}">
            @csrf
            @method('PUT')
            <table class="table table-hover">
                <tbody>
                @foreach($items as $item)
                <tr>
                    <th>{{ $item->category->name }}</th>
                    <th>{{ $item->service->name }}</th>
                    <td>
                        <div class="input-group">
                            <input type="hidden" name="id[]" value="{{ $item->id }}">
                        <input class="form-control" type="text" name="price[]" value="{{ $item->price }}">
                            <div class="input-group-append">
                                <span class="input-group-text">{{ $general->currency_symbol }}</span>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="tile-footer">
                <button class="btn btn-primary btn-block btn-lg" type="submit"><i
                            class="fa fa-fw fa-lg fa-check-circle"></i>Kaydet
                </button>
            </div>
        </form>
    </div>
@endsection