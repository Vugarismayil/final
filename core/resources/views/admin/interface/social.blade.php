@extends('admin.layouts.master')
@section('page_icon', 'fa fa-facebook')
@section('page_name', 'Sosyal Icon Ayarları')
@section('addButton')
    <a class="btn btn-outline-success btn-lg" href="#" data-toggle="modal" data-target="#addIcon"><i
                class="fa fa-plus-circle"></i> Icon Ekle</a>
@endsection
@section('body')
            <div class="row">
                @include('admin.layouts.flash')
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Sosyal Icon Listesi</h3>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th> Icon</th>
                                <th> URL</th>
                                <th> Düzenle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td><i class="fa {{$item->icon}}"></i></td>
                                    <td>{{$item->link}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info icon_item_edit_btn"
                                                data-toggle="modal"
                                                data-route="{{route('social.edit', $item->id)}}"
                                                data-fa="{{ $item->icon }}" data-link="{{ $item->link }}"
                                                data-target="#editSocial"><i
                                                    class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger icon_item_delete_btn"
                                                data-toggle="modal"
                                                data-route="{{route('social.delete', $item->id)}}"
                                                data-target="#deleteSocial"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addIcon" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><b>Sosyal Icon Ekle</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="portlet light bordered">
                                <div class="portlet-body form">
                                    <form role="form" action="{{route('social.store')}}" method="post">
                                        @csrf
                                        <a class="btn btn-info pull-right" href="https://fontawesome.com/v4.7.0/icons/" style="margin-bottom: 5px;"><i class="fa fa-search"></i> Icon adını görmek için BURAYA TIKLAYIN..</a>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for=""><b>Icon</b></label>
                                                <input type="text" name="social_icon" class="form-control form-control-lg"
                                                       id="egtname" placeholder="Fontawesone Icon (e.g: fa-facebook)">
                                            </div>
                                            <div class="form-group">
                                                <label for=""><b>Link</b></label>
                                                <input class="form-control form-control-lg" name="social_url" rows="8" placeholder="type Your URL">
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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><b>Sosyal Icon Ekle</b></h4>
                        </div>
                        <div class="modal-body">
                            <div class="portlet light bordered">
                                <div class="portlet-body form">
                                    <form role="form" method="post" id="socailedit-form">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-info pull-right" href="https://fontawesome.com/v4.7.0/icons/" style="margin-bottom: 5px;"><i class="fa fa-search"></i> Icon adını görmek için BURAYA TIKLAYIN..</a>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for=""><b>Icon</b></label>
                                                <input type="text" id="social_icon" name="social_icon" class="form-control form-control-lg"
                                                       id="egtname" placeholder="Fontawesone Icon (e.g: fa-facebook)">
                                            </div>
                                            <div class="form-group">
                                                <label for=""><b>Link</b></label>
                                                <input class="form-control form-control-lg" id="social_url" name="social_url" rows="8" placeholder="type Your URL">
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
            <div class="modal fade" id="deleteSocial">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="" method="post" id="socaildelete-form">
                                @csrf
                                @method('delete')
                                <h3 class="d-flex justify-content-center">Bu iconu silmek istiyor musunuz?</h3>
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

            $(document).on('click', '.icon_item_edit_btn', function () {
                var route = $(this).data('route');
                var icon = $(this).data('fa');
                var link = $(this).data('link');
                $('#socailedit-form').attr('action', route);
                $('#social_icon').val(icon);
                $('#social_url').val(link);
            });

            $(document).on('click', '.icon_item_delete_btn', function () {
                var route = $(this).data('route');
                $('#socaildelete-form').attr('action', route);
            });
        });
    </script>
@endsection