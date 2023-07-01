@extends('user.layouts.master')
@section('site_title', 'Yeni Sipariş')
@section('page_title')
    <i class="fa fa-first-order"></i> Yeni Sipariş
    @endsection
@section('body')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('user.layouts.flash')
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Yeni bir sipariş verin..</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('newOrder.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label"><b>Kategori</b></label>
                            <select class="form-control" id="category" name="category" required>
                                <option>Kategori Seç</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label"><b>Servisler</b></label>
                            <select class="form-control input-lg" id="service" name="service" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label"><b>Link</b></label>
                            <input class="form-control" name="link" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label"><b>Miktar</b></label>
                            <input class="form-control" name="quantity" id="quantity" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label style="color: #96000e"><b>Min : </b><span id="min">0</span></label>
                            </div>
                            <div class="col-md-6">
                                <label style="color: #96000e"><b>Max : </b><span id="max">0</span></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="btn btn-success">Toplam Fiyat :  <span
                                            id="price">0</span> {{ $general->currency_symbol }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sipariş Ver" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            // fetch Service
            $(document).on('change', '#category', function () {
                var serId = $('option:selected', this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('get.pack') }}',
                    data: {id: serId},
                    success: function (data) {
                        $('#service').html('');
                        $('#service').append('<option>Servis Seç</option>');
                        $.each(data, function (index, value) {
                            $('#service').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        var total = 0;
                        $('#min').text(0);
                        $('#max').text(0);
                        $('#price').text(total.toFixed(2))
                    },
                })
            });

            //package price and quantity
            var price = 0;
            var quantity = 0;
            $(document).on('change', '#service', function () {
                var serviceId = $('option:selected', this).val();
                if (!isNaN(serviceId)) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('get.pack.details') }}',
                        data: {id: serviceId},
                        success: function (data) {
                            $('#min').text(data.min);
                            $('#max').text(data.max);
                            price = data.price_per_k;
                            var total = (price * quantity) / 1000;
                            $('#price').text(total.toFixed(2))
                        },
                    });
                } else {
                    $('#min').text(0);
                    $('#max').text(0);
                    price = 0;
                    quantity = 0;
                    var total = 0;
                    $('#price').text(total.toFixed(2))
                }
            });
            $(document).on('keyup', '#quantity', function () {
                quantity = $(this).val();
                var total = (price * quantity) / 1000;
                $('#price').text(total.toFixed(2))
            });
        });
    </script>
@endsection