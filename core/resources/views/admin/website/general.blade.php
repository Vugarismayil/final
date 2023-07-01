@extends('admin.layouts.master')
@section('page_icon', 'fa fa-cogs')
@section('page_name', 'Genel Ayarlar')
@section('body')
    <div class="row">
        @include('admin.layouts.flash')
        <div class="col-md-12">
            <div class="tile">
                <form method="post" action="{{ route('admin.UpdateGenSetting')}}">
                    @csrf
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Website Başlık</b></label>
                                    <input class="form-control form-control-lg" type="text" name="title"
                                           value="{{ $item->title or '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label"><b>Ana Renk</b></label>
                                    <div class="input-group">
                                        <input class="form-control form-control-lg" type="text" name="color"
                                               id="colorValue" value="{{ $item->base_color or 'fff' }}">
                                        <div class="input-group-append">
                                            <input class="form-control form-control-lg" type="text" id="color"
                                                   value="{{ $item->base_color or 'fff' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b>Para Birimi</b></label>
                                    <input type="text" class="form-control form-control-lg"
                                           value="{{$item->base_currency}}" name="base_currency">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b>Para Birim Sembol</b></label>
                                    <input type="text" class="form-control form-control-lg"
                                           value="{{$item->currency_symbol}}" name="currency_symbol"
                                           id="currency_symbol">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b>Para Birimi Dönüşüm Oranı</b></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">1 USD</span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg"
                                               value="{{$item->currency_rate}}" name="currency_rate">
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                  id="currency_rate">{{ $item->currency_symbol }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b>Üye Kayıt</b></label>
                                    <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                           data-width="100%" type="checkbox" value="1"
                                           name="reg" {{ $item->reg == "1" ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b>Eposta Doğrulama</b></label>
                                    <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                           data-width="100%" type="checkbox" value="1"
                                           name="emailver" {{ $item->email_verification == "1" ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><b>Eposta Bildirimi</b></label>
                                    <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                                           data-width="100%" type="checkbox" value="1"
                                           name="emailnotf" {{ $item->email_notification == "1" ? 'checked' : '' }}>
                                </div>
                            </div>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#color').spectrum({
                color: $('#color').val(),
                change: function (color) {
                    $('#colorValue').val(color.toHexString().slice(1));
                }
            });
            bkLib.onDomLoaded(function () {
                nicEditors.allTextAreas()
            });

            $(document).ready(function () {
                $(document).on('keyup', '#currency_symbol', function () {
                    var val = $(this).val();
                    $('#currency_rate').text(val)
                });
            });
        });
    </script>
@endsection