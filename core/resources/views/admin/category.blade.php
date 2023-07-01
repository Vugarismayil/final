@extends('admin.layouts.master')
@section('page_icon', 'fa fa-list-alt')
@section('page_name', 'Kategori')
@section('addButton')
    <a class="btn btn-outline-success btn-lg" href="#" data-toggle="modal" data-target="#addCategory"><i
                class="fa fa-plus-circle"></i> Kategori Ekle</a>
@endsection
@section('body')
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">
                    Kategoriler
                </h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Adı</th>
                        <th>Durum</th>
                        <th>Ayarlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key => $item)
                    <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        {!! $item->status == 0 ? '<b style="color:#d35400">Kapalı</b>' : '<b style="color:#16a085">Aktif</b>' !!}
                    </td>
                    <td>
                    <button class="btn btn-outline-info category_edit_btn"
                    data-toggle="modal"
                    data-target="#editCategory"
                    data-route="{{ route('category.update', $item->id) }}"
                    data-title="{{ $item->name }}"
                    data-image="{{ $item->image }}"
                    data-status="{{ $item->status }}">
                        <i class="fa fa-edit"></i></button>
                    <button class="btn btn-outline-danger category_dlt_btn"
                    data-toggle="modal"
                    data-target="#delCategory"
                    data-route="{{ route('category.delete', $item->id) }}">
                    <i class="fa fa-trash"></i></button>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCategory" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><b>Kategori Ekle</b></h4>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for=""><b>Adı</b></label>
                                        <input type="text" name="name" class="form-control form-control-lg"
                                               id="egtname">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Resim</b></label>
                                        <input type="file" class="form-control form-control-lg" name="image" />
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Durum</b></label>
                                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                              data-on="Aktif" data-off="Kapalı" data-width="100%" type="checkbox" name="status" value="1">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">İptal Et</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="editCategory" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><b>Kategori Düzenle</b></h4>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="" method="post"
                                  id="categoryEditdForm" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for=""><b>Adı</b></label>
                                        <input type="text" name="name" class="form-control form-control-lg"
                                               id="name">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <img src="" id="category-img" style="max-width: 360px; max-height: 230px">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Resim</b></label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Durum</b></label>
                                        <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                               data-on="Aktif" data-off="Kapalı" data-width="100%" type="checkbox" name="status" id="status" value="1">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">İptal Et</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="delCategory">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="post" id="categoryDelForm">
                        @csrf
                        @method('delete')
                        <h3 class="d-flex justify-content-center">Bu kategoriyi silmek istiyor musunuz?</h3>
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
            $(document).on('click', '.category_edit_btn', function () {
                var route = $(this).data('route');
                var title = $(this).data('title');
                var image = "{{ asset('assets/frontend/upload/service/') }}" + "/" + $(this).data('image');
                var status = $(this).data('status');
                $('#name').val(title);
                $('#category-img').attr('src', image);
                $('#categoryEditdForm').attr('action',route);
                if(status == 1){
                    $('#status').bootstrapToggle('on');
                }else{
                    $('#status').bootstrapToggle('off');
                }
            });
            $(document).on('click', '.category_dlt_btn', function () {
                var route = $(this).data('route');
                $('#categoryDelForm').attr('action', route);
            });

            $(document).on('change', '#image', function () {
                logoURL(this);
            });

            function logoURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#category-img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
@endsection