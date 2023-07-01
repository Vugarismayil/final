@extends('admin.layouts.master')
@section('page_icon', 'fa fa-quote-left')
@section('page_name', 'Yorum Ayarları')
@section('addButton')
    <a class="btn btn-outline-success btn-lg" href="#" data-toggle="modal" data-target="#addIcon"><i
                class="fa fa-plus-circle"></i> Yorum Ekle</a>
@endsection
@section('body')
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Yorum Listesi</h3>
                <div class="row">
                    @foreach($items as $item)
                        <div class="col-md-4">
                            <div class="card mb-2">
                                <div class="card-header bg-dark text-white">
                                    {{ $item->name  }}
                                </div>
                                <div class="card-body">
                                    <img class="w-100 mb-2"
                                         src="{{ asset('assets/frontend/upload/testimonial') }}/{{ $item->image }}">
                                    <p class="text-justify">{{ substr($item->description, 0, 120) }}..</p>
                                    <div class="text-center">
                                        <button class="btn btn-outline-info item_edit_btn" data-toggle="modal"
                                                data-target="#editSocial" data-route="{{ route('admin.testimonial.update', $item->id) }}" data-title="{{ $item->name }}"
                                                data-des="{{ $item->description }}"><i class="fa fa-edit"></i> Düzenle
                                        </button>
                                        <button class="btn btn-outline-danger item_delete_btn" data-toggle="modal"
                                                data-target="#deleteitem" data-route="{{ route('admin.testimonial.delete', $item->id) }}"><i class="fa fa-trash"></i> Sil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $items->render() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addIcon" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><b>Yorum Ekle</b></h4>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form" action="{{route('admin.testimonial.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for=""><b>Resim</b></label>
                                        <input type="file" name="image" class="form-control form-control-lg"
                                               placeholder="title">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Adı</b></label>
                                        <input type="text" name="name" class="form-control form-control-lg"
                                               placeholder="title">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Açıklama</b></label>
                                        <textarea class="form-control form-control-lg" name="description" rows="8"
                                                  placeholder="description"></textarea>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editSocial" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><b>Yorum Düzenle</b></h4>
                </div>
                <div class="modal-body">
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form role="form"  method="post"
                                  enctype="multipart/form-data" id="edit-form">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for=""><b>Resim</b></label>
                                        <input type="file" name="image"
                                               class="form-control form-control-lg">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Adı</b></label>
                                        <input type="text" id="editTitle" name="name"
                                               class="form-control form-control-lg" placeholder="title">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><b>Açıklama</b></label>
                                        <textarea class="form-control form-control-lg" id="editDes" name="description"
                                                  rows="8" placeholder="description"></textarea>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteitem">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="post" id="delete-form">
                        @csrf
                        @method('delete')
                        <h3 class="d-flex justify-content-center">Bu yorumu silmek istiyor musunuz?</h3>
                        <div class="tile-footer d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Evet
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-danger" href="#" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Hayır</a>
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
            $(document).on('focus', '.socioicon', function () {
                $('.socioicon').iconpicker();
            });

            $(document).on('click', '.item_edit_btn', function () {
                var route = $(this).data('route');
                var title = $(this).data('title');
                var des = $(this).data('des');
                $('#edit-form').attr('action', route);
                $('#editTitle').val(title);
                $('#editDes').val(des);
            });

            $(document).on('click', '.item_delete_btn', function () {
                var route = $(this).data('route');
                $('#delete-form').attr('action', route);
            });
        });
    </script>
@endsection