@extends('admin.layouts.master')
@section('page_icon', 'fa fa-suitcase')
@section('page_name', 'Servisler')
@section('addButton')
    <a class="btn btn-outline-success btn-lg" href="#" data-toggle="modal" data-target="#addService"><i
                class="fa fa-plus-circle"></i> Servis Ekle</a>
@endsection
@section('body')
    <ul class="orders-ul">
        <li class="text-color"><a class="btn btn-outline-secondary" href="{{ route('api.service') }}" target="_blank">API Servis Listesi</a></li>
    </ul>
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Servisler</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Adı</th>
                        <th>Kategori</th>
                        <th>Fiyatı 1K</th>
                        <th>Min</th>
                        <th>Max</th>
                        <th>Sipariş Ayarı</th>
                        <th>Durum</th>
                        <th>Ayarlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->price_per_k }}</td>
                            <td>{{ $item->min }}</td>
                            <td>{{ $item->max }}</td>
                            <td>{{ $item->service_id == 0? 'Manuel' : 'API' }}</td>
                            <td>
                                {!! $item->status == 0 ? '<b style="color:#d35400">Aktif Değil</b>' : '<b style="color:#16a085">Aktif</b>' !!}
                            </td>
                            <td>
                                <button class="btn btn-outline-info service_edit_btn"
                                        data-toggle="modal"
                                        data-target="#editService"
                                        data-route="{{ route('service.update', $item->id) }}"
                                        data-category="{{ $item->category_id }}"
                                        data-name="{{ $item->name }}"
                                        data-price="{{ $item->price_per_k }}"
                                        data-min="{{ $item->min }}"
                                        data-max="{{ $item->max }}"
                                        data-service_id="{{ $item->service_id }}"
                                        data-details="{{ $item->details }}"
                                        data-status="{{ $item->status }}">
                                    <i class="fa fa-edit"></i></button>
                                <button class="btn btn-outline-danger service_dlt_btn"
                                        data-toggle="modal"
                                        data-target="#delService"
                                        data-route="{{ route('service.delete', $item->id) }}">
                                    <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addService" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><b>Servis Ekle</b></h4>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{ route('service.store') }}" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for=""><b>Kategori</b></label>
                                        <select name="category_id" class="form-control form-control-lg">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Adı</b></label>
                                        <input type="text" name="name" class="form-control form-control-lg">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Fiyatı 1k</b></label>
                                        <div class="input-group">
                                        <input type="text" name="price_per_k" class="form-control form-control-lg">
                                        <div class="input-group-append">
                                            <span class="input-group-text">{{ $general->currency_symbol }}</span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Min</b></label>
                                            <input type="text" name="min" class="form-control form-control-lg">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Max</b></label>
                                            <input type="text" name="max" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Detaylar</b></label>
                                        <textarea class="form-control" name="details" rows="8"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Hizmet kimliği (API üzerinden sipariş işlemi yapılırsa)</b></label>
                                        <input type="text" name="service_id" class="form-control form-control-lg">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Durum</b></label>
                                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                               data-on="Aktif" data-off="Aktif Değil" data-width="100%" type="checkbox" name="status" value="1">
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary btn-block btn-lg" type="submit"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i>Kaydet
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="editService" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><b>Düzenle</b></h4>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="" method="post"
                                  id="serviceEditdForm">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for=""><b>Kategori</b></label>
                                        <select name="category_id" id="category_id" class="form-control form-control-lg">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Adı</b></label>
                                        <input type="text" name="name" id="name" class="form-control form-control-lg">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Fiyatı 1k</b></label>
                                        <div class="input-group">
                                            <input type="text" name="price_per_k" id="price_per_k" class="form-control form-control-lg">
                                            <div class="input-group-append">
                                                <span class="input-group-text">{{ $general->currency_symbol }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Min</b></label>
                                            <input type="text" name="min" id="min" class="form-control form-control-lg">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Max</b></label>
                                            <input type="text" name="max" id="max" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Detaylar</b></label>
                                        <textarea class="form-control" name="details" id="details" rows="8"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Hizmet kimliği (API üzerinden sipariş işlemi yapılırsa)</b></label>
                                        <input type="text" name="service_id" id="service_id" class="form-control form-control-lg">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Durum</b></label>
                                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                               data-on="Aktif" data-off="Aktif Değil" data-width="100%" type="checkbox" name="status" id="status" value="1">
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary btn-block btn-lg" type="submit"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i>Kaydet
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">İptal</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="delService">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="post" id="serviceDelForm">
                        @csrf
                        @method('delete')
                        <h3 class="d-flex justify-content-center">Bu servisi silmek istiyor musunuz?</h3>
                        <div class="tile-footer d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Onayla
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-danger" href="#" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>İptal</a>
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
            $(document).on('click', '.service_edit_btn', function () {
                var route = $(this).data('route');
                var category = $(this).data('category');
                var name = $(this).data('name');
                var price = $(this).data('price');
                var min = $(this).data('min');
                var max = $(this).data('max');
                var service_id = $(this).data('service_id');
                var details = $(this).data('details');
                var status = $(this).data('status');
                $('#category_id').val(category).attr('selected', 'selected');
                $('#name').val(name);
                $('#price_per_k').val(price);
                $('#min').val(min);
                $('#max').val(max);
                $('#service_id').val(service_id);
                $('#details').val(details);
                $('#serviceEditdForm').attr('action',route);
                if(status == 1){
                    $('#status').bootstrapToggle('on');
                }else{
                    $('#status').bootstrapToggle('off');
                }
            });
            $(document).on('click', '.service_dlt_btn', function () {
                var route = $(this).data('route');
                $('#serviceDelForm').attr('action', route);
            });
        });
    </script>
@endsection