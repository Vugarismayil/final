@extends('admin.layouts.master')
@section('page_icon', 'fa fa-info')
@section('page_name', 'Sipariş Detayları')
@section('body')
    <div class="tile">
        @include('admin.layouts.flash')
        <h3 class="tile-title">Sipariş Detayları</h3>
        <form method="post" action="{{ route('admin.edit.order', $item->id) }}">
            @csrf
            @method('PUT')
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>Kullanıcı Adı</th>
                    <td><a href="{{ route('admin.user-single', $item->user_id) }}">{{$item->user->username}}</a></td>
                </tr>
                <tr>
                    <th>Sipariş ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Servis</th>
                    <td>{{ $item->category->name }}</td>
                </tr>
                <tr>
                    <th>Paket</th>
                    <td>{{ $item->service->name }}</td>
                </tr>
                <tr>
                    <th>Link</th>
                    <td><a href="{{$item->link}}">{{$item->link}}</a></td>
                </tr>
                <tr>
                    <th>Miktar</th>
                    <td>{{ $item->quantity }}</td>
                </tr>
                <tr>
                    <th>Tarih</th>
                    <td>{{ $item->created_at->format('d M Y - H:i A') }}</td>
                </tr>
                <tr>
                    <th>Sipariş Ver</th>
                    <td>{{ $item->order_through }}</td>
                </tr>
                <tr>
                    <th>Sayacı Başlat</th>
                    <td><input type="text" name="start_counter" value="{{ $item->start_counter }}" id="start_counter"
                               class="form-control"></td>
                </tr>
                <tr>
                    <th>Kalıntılar</th>
                    <td><input type="text" name="remains" value="{{ $item->remains }}" id="remains"
                               class="form-control"></td>
                </tr>
                <tr>
                    <th>Durum</th>
                    <td><select id="status" class="form-control form-control-lg" name="status">
                            <option value="Pending" {{ $item->status == 'Pending' ? 'selected':'' }}>Bekleyen</option>
                            <option value="Processing" {{ $item->status == 'Processing' ? 'selected':'' }}>İşleme
                            </option>
                            <option value="In Progress" {{ $item->status == 'In Progress' ? 'selected':'' }}>Devam Eden
                            </option>
                            <option value="Partial" {{ $item->status == 'Partial' ? 'selected':'' }}>Kısmi</option>
                            <option value="Complete" {{ $item->status == 'Complete' ? 'selected':'' }}>Tamamlanan</option>
                            <option value="Cancelled" {{ $item->status == 'Cancelled' ? 'selected':'' }}>İptal Edilen
                            </option>
                            <option value="Refunded" {{ $item->status == 'Refunded' ? 'selected':'' }}>Geri Ödenen</option>
                        </select></td>
                </tr>
                </tbody>
            </table>
            <div class="tile-footer">
                @if($item->status != 'Partial' && $item->status != 'Cancelled' && $item->status != 'Refunded')
                    <button class="btn btn-primary btn-block btn-lg" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i>Kaydet
                    </button>
                @elseif($item->status != 'Refunded')
                    <button class="btn btn-danger btn-block btn-lg" type="button" data-toggle="modal"
                            data-target="#refundModal"><i
                                class="fa fa-fw fa-lg fa-paper-plane"></i>Geri Öde
                    </button>
                    <div class="modal fade" id="refundModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h3 class="d-flex justify-content-center">Ödemelisin</h3>
                                    <div class="form-group">
                                        <label for=""><b>Miktar</b></label>
                                        <div class="input-group">
                                            <input type="text" name="refund" id="refund"
                                                   class="form-control form-control-lg">
                                            <div class="input-group-append">
                                                <span class="input-group-text">{{ $general->currency_symbol }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-footer d-flex justify-content-center">
                                        <button class="btn btn-primary" type="submit"><i
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Onayla
                                        </button>&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-danger" href="#" data-dismiss="modal"><i
                                                    class="fa fa-fw fa-lg fa-times-circle"></i>Kapat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var quantity = {{ $item->quantity }};
            var price = {{ $item->price }};
            var remains = {{ $item->remains }};
            var refund = remains * price / quantity;
            $('#refund').val(refund);
        });
    </script>
@endsection